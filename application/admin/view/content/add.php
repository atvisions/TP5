{extend name='global/base'};
{block name='header'}
<link rel="stylesheet" type="text/css" href="{:url('/static/simditor')}/styles/simditor.css" />
<script type="text/javascript" src="{:url('/static/simditor')}/scripts/module.min.js"></script>
<script type="text/javascript" src="{:url('/static/simditor')}/scripts/hotkeys.min.js"></script>
<script type="text/javascript" src="{:url('/static/simditor')}/scripts/uploader.min.js"></script>
<script type="text/javascript" src="{:url('/static/simditor')}/scripts/simditor.min.js"></script>
<script>
 function PreviewImage(imgFile) {
  var filextension = imgFile.value.substring(imgFile.value
    .lastIndexOf("."), imgFile.value.length);
  filextension = filextension.toLowerCase();
  if ((filextension != '.jpg') && (filextension != '.gif')
    && (filextension != '.jpeg') && (filextension != '.png')
    && (filextension != '.bmp')) {
   alert("对不起，系统仅支持标准格式的照片，请您调整格式后重新上传，谢谢 !");
   imgFile.focus();
  } else {
   var path;
   if (document.all)//IE
   {
    imgFile.select();
    path = document.selection.createRange().text;
    document.getElementById("photo_info").innerHTML = "";
    document.getElementById("photo_info").style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(enabled='true',sizingMethod='scale',src=\""
      + path + "\")";//使用滤镜效果  
   } else//FF
   {
    path = window.URL.createObjectURL(imgFile.files[0]);// FF 7.0以上
    //path = imgFile.files[0].getAsDataURL();// FF 3.0
    document.getElementById("photo_info").innerHTML = "<img id='img1' width='120px' height='100px' src='"+path+"'/>";
    //document.getElementById("img1").src = path;
   }
  }
 }

</script>
{/block}
{block name="content"}
<div class="page-header">
  <h1>新闻{$typeName}</h1>
</div>
<div class="col-sm-6">
<form action="{:url('admin/content/save')}" method="post"  enctype="multipart/form-data">
{:token()}
<input type="hidden" name="id" value="{$item->id|default=''}">
  <div class="form-group">
    <label for="title">标题</label>
    <input type="text" class="form-control" id="title" placeholder="标题" name="title" value="{$item->title|default=''}">
  </div>
  <div class="form-group">
    <label for="subtitle">副标题</label>
    <input type="text" class="form-control" id="subtitle" placeholder="副标题" name="subtitle" value="{$item->subtitle|default=''}">    
  </div>
  <div class="form-group">
    <label for="litimg">缩略图</label>
    <input type="file" id="litimg" name="litimg" onchange='PreviewImage(this)'>
    <p class="help-block" id="photo_info"><img src="{$item->litimg|default='/static/nopic_b.gif'}" width="100" height="100"></p>
  </div>
  <div class="form-group">
    <label for="content">内容</label>
    <textarea class="form-control" id="content" name="content" rows='20'>{$item->content|default=''}</textarea> 
    <script>
      var editor = new Simditor({
        textarea: $('#content'),
        toolbar:[          
          'title',
          'bold',
          'italic',
          'underline',
          'strikethrough',
          'fontScale',
          'color',
          'ol',       
          'ul',            
          'blockquote',
          'code',         
          'table',
          'link',
          'image',
          'hr' ,         
          'indent',
          'outdent',
          'alignment'
        ],
        upload:{
          url: "{:url('admin/content/up')}",
          params: null,
          fileKey: 'upload_file',
          leaveConfirm: '正在上传图片，你确定要关闭吗?'

        },
        pasteImage : true
        //optional options
    }); 
</script>
  </div>
 
  <div class="form-group">
    <label for="content_state">状态</label>
   <select name="content_state" id="content_state" class="form-control">
   {volist name='content_state' id='row'}
    <option value="{$key}">{$row | strip_tags}</option>
    {/volist}
   </select>
  <script>
  $('#content_state').val({$item->content_state | default = 1})
  </script>
  </div>

  <button type="submit" class="btn btn-default">提交</button>
</form>
</div>
{/block}