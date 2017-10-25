tinymce.init({
  selector: 'textarea',
  height: 900,
  theme: 'modern',
  plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools'
  ],
  toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  toolbar2: 'print preview media | forecolor backcolor emoticons',
  image_advtab: true,
  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ],
  content_css: [
    '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
    '//www.tinymce.com/css/codepen.min.css'
  ]
 });

$(document).ready(function(){
	$('#selectAllBoxes').click(function(event){

		if(this.checked){
			$('.checkBoxes').each(function(){
				this.checked = true;
			});
		} else {
				$('.checkBoxes').each(function(){
				this.checked = false;
		});
			}
	});

// var div_box = "<div id='load-screen'><div id='loading'></div></div>";
// $("body").prepend(div_box);

// $('#load-screen').delay(2000).fadeOut(3214, function(){
// 	$(this).remove();

// });
}); 

function loadUsersOnline(){

  $.get("functions.php?onlineusers=result", function(data){
    $(".usersonline").text(data);
  });
} 
setInterval(function(){
  loadUsersOnline();
}, 500);
