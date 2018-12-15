<div>
<? 
echo $this->Form->create('Item', array(
    'url' => $this->Html->url(array('controller' => 'items', 'action' => 'add')),
    'type' => 'file'
));

$item_options = array();
foreach($item_types as $type) {
    $item_options[$type] = $type;
}

echo $this->Form->input('type', array(
    'type' => 'select',
    'options' => $item_options,
    'label' => 'type item'
));
echo $this->Form->input('subject', array(
    'type' => 'text',
    'label' => 'subject'
));

echo $this->Form->input('description', array(
    'type' => 'text',
    'label' => 'beschrijving'
));
/*
 *plupload starter with drag and drop
 */
echo '<ul id="filelist"></ul><br>';
echo '<div id="container">'.
        '<a id="browse" href="javascript:;"> [Browse..]</a>'.
        '<a id="start-upload" href="javascript:;">[Start upload]</a>'.    
    '</div>';
echo '<div id="drop-target" style="width:400px; height:400px; border:1px solid black;"></div>';

echo $this->Form->submit('nieuw item aanmaken');
echo $this->Form->end();

echo $this->Form->create('File', array(
    //'url' => $this->Html->url(array('controller' => 'files', 'action' => 'add')),
    'url' => '/files/add',
    'enctype' => 'multipart/form-data'
));
echo $this->Form->input('file', array(
    'type' => 'file',
    'accept' => 'image/*',
    'id' => 'filePicker',
    'multiple'
));
echo $this->Form->button('Upload', array(
    'type' => 'submit'
));
echo $this->Form->end();

?>
</div>
<script type="text/javascript">
$(document).ready(function(){
    // native file api 

    function handleFileSelect(evt) {
        var form = evt.target.form;
        var files = evt.target.files;
    // Loop through the FileList and render image files as thumbnails.
    for (var i = 0, f; f = files[i]; i++) {

      // Only process image files.
      if (!f.type.match('image.*')) {
        continue;
      }

      var reader = new FileReader();

      // Closure to capture the file information.
      reader.onload = (function(theFile) {
          return function(e) {
              uploadFile(e.target.result, form);

            // Render thumbnail.
            /*
          var span = document.createElement('span');
          span.innerHTML = ['<img class="thumb" src="', e.target.result,
                            '" title="', escape(theFile.name), '"/>'].join('');
          document.getElementById('list').insertBefore(span, null);
             */
            //console.log(e.target);
            //console.log(theFile);
        };
      })(f);

      // Read in the image file as a data URL.
      reader.readAsDataURL(f);
      //uploadFile(f);
    }
    }

    $('#filePicker').on('change', function(e) {
        var files = $(this).get(0).files;
        var form = $(this)[0].form;
        uploadFile(files, form);
    });

    function uploadFile(files, form) {
        //var data = {file: file};
        
        for (var i = 0, f; f = files[i]; i++) {
            var data = new FormData();
            data.append(f.name, f);
            console.log(f.name);
        }
        console.log(files);
        console.log(data.getAll('file'));
        $.ajax({
            method: 'POST',
            url: form.action,
            data: data,
            //dataType: 'JSON',
            contentType: false,
            //async: false,
            processData: false,
            beforeSend: function (e) {
                e.abort();
            },
            success: function(response) {
                console.log(response);
            },
            error: function (response) {
                console.log(response.responseText);
            }
        });
/*
        var xhr = new XMLHttpRequest();
        var formData = new FormData();
        formData.append('Files', file);
        for(var p of formData) {
        }
        formData.values(function(val) {
        });
        console.log(formData);
        xhr.open('PUT', '/rickaltena/files/add', true);

        xhr.onload = function() {
            if(xhr.status == 200) {
                console.log(xhr.responseText);
            }
            else {
                console.log('fail');
            }

        }
    xhr.send(file);
 */
    }
/*

      var reader = new FileReader();

      // Closure to capture the file information.
      reader.onload = (function(theFile) {
        return function(e) {
          // Render thumbnail.
          var span = document.createElement('span');
          span.innerHTML = ['<img class="thumb" src="', e.target.result,
                            '" title="', escape(theFile.name), '"/>'].join('');
          document.getElementById('list').insertBefore(span, null);
        };
      })(f);

      // Read in the image file as a data URL.
      reader.readAsDataURL(f);
    }
  }



    $('#filePicker').on('change', function(e){
        handleFileSelect(e);
    });

 */


//below is plupload     
var uploader = new plupload.Uploader({
    browse_button: 'browse',

    url: "<?= $this->Html->url(array('controller' => 'files', 'action' => 'add'))?>",
    drop_element: 'drop-target',
    select_multiple: true
});

uploader.bind('Init', function(up, params) {
    if (uploader.features.dragdrop) {
        var target = $('drop-target');
        target.ondragover = function(event) {
            event.dataTransfer.dropEffect = "copy"; 
        };
        target.ondragenter = function() {
            this.className = "dragover"; 
        }; 
        target.ondragleave = function() { 
            this.className = "";
        }; 
        target.ondrop = function() { 
            this.className = ""; 
        }; 
    } 
});
uploader.init();

uploader.bind('FilesAdded', function(up, files) {

	var html = '';
	plupload.each(files, function(file) {
		html += '<li id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></li>';
	});
    document.getElementById('filelist').innerHTML += html;

	uploader.start();
});

uploader.bind('UploadProgress', function(up, file) {
	document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
});

uploader.bind('Error', function(up, err) {
	document.getElementById('console').innerHTML += "\nError #" + err.code + ": " + err.message;
});

document.getElementById('start-upload').onclick = function() {
	uploader.start();
};
});
</script>
