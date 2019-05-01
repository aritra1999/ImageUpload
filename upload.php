<?php

//upload.php

if(!empty($_FILES))
{
	if(is_uploaded_file($_FILES['uploadFile']['tmp_name']))
	{
		sleep(1);
		$source_path = $_FILES['uploadFile']['tmp_name'];
		$target_path = 'upload/' . $_FILES['uploadFile']['name'];
		if(move_uploaded_file($source_path, $target_path))
		{
			$size = filesize($target_path);
			$prefix = "B";

			if($size > 1024){
				$size = $size/(1024*1024);
				$size = round($size, 3);
				$prefix = "MB";
			}
			$type = pathinfo($target_path, PATHINFO_EXTENSION);
			echo '<br><br>

				<ul class="list-group" style="width:60%;">
					<li class="list-group-item">
						<lable>File Size&nbsp:&nbsp</lable>'.$size.'&nbsp;'.$prefix.'<br>
					</li>
					<li class="list-group-item">
						File Type&nbsp:&nbsp</lable>'.$type.'
					</li>
				</ul>
				<br>
				<button type="button" class="btn btn-outline-primary" data-toggle="modal"s style="width:60%" data-target=".bd-example-modal-lg">Preview</button>
				
			';
			echo'
			
			<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg modal-dialog-centered">
				<div class="modal-content">
					<button type="button" class="close" data-dismiss="modal" style="position: absolute;right:20px;top:12px;font-size:32px;"  aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
						<img src="'.$target_path.'" class="img-thumbnail" width="100%" />
					</div>
				</div>
			</div>
			
			';
		}
	}
}

?>