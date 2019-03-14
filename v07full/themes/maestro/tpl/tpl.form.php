
<?php
$prefix = 'form'; $id = $data["id"];
foreach($fields as $key => $field) {

	if(@$field['hide']) continue;
$widget = $field[1];
$value = (isset($data[$key]) ? $data[$key] : "");
$required = (@$field['required'] > 0);
$langs = getlangs();
?>

<tr>
	<?php
		switch($widget) {
			case WIDGET_CHECKBOX: echo "<td></td><td class='inputs'>"; break;
			case WIDGET_HIDDEN: break;

			case WIDGET_HTML:
			case WIDGET_MARKDOWN:
			case WIDGET_TEXTAREA:
			case WIDGET_BBCODE:
				echo "<td colspan=2 class='inputs'>";
				break;

			default:
				echo "<td class='lbl'>" . T($key) . ':'.  ($required ? "<sup>*</sup>":'') . "</td><td class='inputs'>";
				break;
	}

	switch($widget) {

		case WIDGET_FLAG: $apiurl = 'http://localhost/langselect/'; ?>
		<select class="msDropDown" name="<?php echo $prefix;?>[<?php echo $key;?>]" id="<?php echo $key;?>">
			<?php
			$langs = json_decode(file_get_contents( $apiurl . 'api.php'));
			foreach($langs as $lang) {
				echo '<option value='. $lang . ' title="' .  $apiurl . 'flags/' . $lang .'">' . preparelang($lang) . '</option>';
			}
			?>
	 </select>
	 	<?php break;

		case WIDGET_INFO: ?>
			<?php echo $value;?>
			<input type="hidden"
				value="<?php echo $value;?>"
				name="<?php echo $prefix;?>[<?php echo $key;?>]"
				id="<?php echo $key;?>"<?php if($required) echo " required";?> />


		<?php break;


		case WIDGET_TEXT: ?>
			<input type="text"
				value="<?php echo $value;?>"
				name="<?php echo $prefix;?>[<?php echo $key;?>]"
				id="<?php echo $key;?>"<?php if($required) echo " required";?> />
		<?php break;
		case WIDGET_MULTISTRING: $value = unserialize($value);
			foreach($langs as $lang) { $abbr = $lang['abbr']; ?>
			<?php echo $lang['name'];?>: <br> <input type="text"
				value="<?php echo  @$value[$abbr];?>"
				name="<?php echo $prefix;?>[<?php echo $key;?>][<?php echo $abbr;?>]"
				id="<?php echo $key;?>"<?php if($required) echo " required";?> /><br>
		<?php  } break;

		case WIDGET_MULTITEXT:  $value = unserialize($value);
			foreach($langs as $lang) { $abbr = $lang['abbr'];?>
			<?php echo $lang['name'];?>:<br>
				<textarea<?php if($required) echo " required";?> cols="100" rows="10"
					name="<?php echo $prefix;?>[<?php echo $key;?>][<?php echo $abbr;?>]"
					id="<?php echo $key . '_' . $abbr;?>"><?php echo @$value[$abbr];?></textarea><br>
		<?php  } break;

		case WIDGET_SLUG: ?>
			<input type="text"
				class="slug"
				value="<?php echo $value;?>"
				name="<?php echo $prefix;?>[<?php echo $key;?>]"
				id="<?php echo $key;?>"<?php if($required) echo " required";?> />
		<?php break;

		case WIDGET_EMAIL: ?>
			<input type="email"
				value="<?php echo $value;?>"
				name="<?php echo $prefix;?>[<?php echo $key;?>]"
				id="<?php echo $key;?>"<?php if($required) echo " required";?> />
		<?php break;

		case WIDGET_PHONE: ?>
			<input type="tel"
				class="phone"
				value="<?php echo $value;?>"
				name="<?php echo $prefix;?>[<?php echo $key;?>]"
				id="<?php echo $key;?>"<?php if($required) echo " required";?> />
		<?php break;

		case WIDGET_NUMBER: ?>
			<input type="number"
				value="<?php echo $value;?>"
				name="<?php echo $prefix;?>[<?php echo $key;?>]"
				id="<?php echo $key;?>"<?php if($required) echo " required";?> />
		<?php break;

		case WIDGET_URL: ?>
			<input type="url"
				value="<?php echo $value;?>"
				name="<?php echo $prefix;?>[<?php echo $key;?>]"
				id="<?php echo $key;?>"<?php if($required) echo " required";?> />
		<?php break;

		case WIDGET_KEYVALUES:
			$values = array();
			foreach($value as $k => $v) {
				$values[] = $k . '=' . $v;
			}
			$value = implode(PHP_EOL, $values);

		?>
			<textarea<?php if($required) echo " required";?> cols="50" rows="10"
				name="<?php echo $prefix;?>[<?php echo $key;?>]"
				id="<?php echo $key;?>"><?php echo $value;?></textarea>
		<?php break;

		case WIDGET_TEXTAREA: ?>
			<?php echo T($key);?>:<br>
			<textarea<?php if($required) echo " required";?> cols="100" rows="10"
				name="<?php echo $prefix;?>[<?php echo $key;?>]"
				id="<?php echo $key;?>"><?php echo $value;?></textarea>
		<?php break;

		case WIDGET_HTML:  ?>
			<?php echo T($key);?>:<br>
			<textarea<?php if($required) echo " required";?> class="html" cols="100" rows="10"
				name="<?php echo $prefix;?>[<?php echo $key;?>]"
				id="<?php echo $key;?>"><?php echo $value;?></textarea>

		<?php
			/*include('external/maestroeditor/editor.php');
			maestroeditor($key, $key, $value);

		/* ?>
			<?php echo T($key);?>:<br>
			<textarea cols="100" rows="20"
				name="<?php echo $prefix;?>[<?php echo $key;?>]"
				id="<?php echo $key;?>"><?php echo $value;?></textarea>
			<script type="text/javascript">
				<!--CKEDITOR.replace( "<?php echo $key;?>" );-->
				bkLib.onDomLoaded(function() {
					new nicEditor({fullPanel : true,maxHeight : 600}).panelInstance('<?php echo $key;?>');
				});
			</script>
		<?php break;	/**/
		break;

		case WIDGET_BBCODE: ?>
			<?php echo T($key);?>:<br>
			<textarea<?php if($required) echo " required";?> cols="100" rows="15"
				name="<?php echo $prefix;?>[<?php echo $key;?>]"
				id="<?php echo $key;?>"><?php echo $value;?></textarea>
			<script type="text/javascript">
				CKEDITOR.config.toolbar_Full = [
					["Source"],
					["Undo","Redo"],
					["Bold","Italic","Underline","-","Link", "Unlink"],
					["Blockquote", "TextColor", "Image"],
					["SelectAll", "RemoveFormat"]
				] ;
				CKEDITOR.config.extraPlugins = "bbcode";
				//<![CDATA["
					var sBasePath = document.location.pathname.substring(0,document.location.pathname.lastIndexOf("plugins")) ;
					var CKeditor = CKEDITOR.replace( "<?php echo $key;?>", {
							customConfig : sBasePath + "plugins/bbcode/_sample/bbcode.config.js"
					}  );
				//]]>
			</script>
		<?php break;

		case WIDGET_PASS: ?>
			<input type="password"<?php if($required) echo " required";?> value="" name="<?php echo $prefix;?>[<?php echo $key;?>]" id="<?php echo $key;?>" />";
		<?php break;

		case WIDGET_HIDDEN: ?>
			<input type="hidden"
				value="<?php echo $value;?>"
				name="<?php echo $prefix;?>[<?php echo $key;?>]"
				id="<?php echo $key;?>" />
		<?php break;

		case WIDGET_CHECKBOX: ?>
			<!--<input type="hidden" name="<?php echo $prefix;?>[<?php echo $key;?>]" value="">-->
			<input type="checkbox"<?php if($required) echo " required";?>  value=1 name="<?php echo $prefix;?>[<?php echo $key;?>]" id="<?php echo $key;?>"
			<?php if($value == 1) echo " checked";?> />
		<?php break;

		case WIDGET_RADIO: ?>
		<?php
			if(is_array($options) && sizeof($options) > 0) {
				foreach (@$options[$key] as $kk => $vv){ ?>
					<?php echo T($vv);?>
					<input type="radio"
						name="<?php echo $prefix;?>[<?php echo $key;?>]"
						value="<?php echo $kk;?>"<?php if($required) echo " required";?>
						<?php if($kk == $value) echo " checked";?> />
			<?php } ?>
		<?php } ?>
		<?php break;

		case WIDGET_SELECT: ?>
			<select name="<?php echo $prefix;?>[<?php echo $key;?>]" id="<?php echo $key;?>">
			<?php
				if(is_array($options) && sizeof($options) > 0) {
					foreach (@$options[$key] as $kk => $vv){ ?>
						<option value="<?php echo $kk;?>"
							<?php if($kk == $value) echo " selected='selected'";?>><?php echo T($vv);?>
						</option>
				<?php } ?>
			<?php } ?>
			</select>
		<?php break;

		case WIDGET_SELECT_IMG: ?>
		<select class="imgselect"  name="<?php echo $prefix;?>[<?php echo $key;?>]" id="<?php echo $key;?>">
		<?php
			if(is_array($options) && sizeof($options) > 0) {
				$value = $value ?? $options[0]['value'];
				foreach (@$options[$key] as $row){ print_r($row);
					?>
					<option value="<?php echo $row['value'];?>" 
						<?php if($row['img']) echo "title='" . $row['img'] . "' ";?>
						<?php if($row['value'] == $value) echo " selected='selected'";?>><?php echo T($row['text']);?>
					</option>
			<?php } ?>
		<?php } ?>
		</select>
		<?php break;

		case WIDGET_MULTSELECT: ?>
			<select multiple<?php if($required) echo " required";?> name="<?php echo $prefix;?>[<?php echo $key;?>][]" id="<?php echo $key;?>">
			<?php
				$dat = array_flip(explode(",", $value));
				if(is_array($options) && sizeof($options) > 0) {
					foreach (@$options[$key] as $kk => $vv){ ?>
						<option value="<?php echo $kk;?>"
							<?php if(isset($dat[$kk])) echo " selected='selected'";?>><?php echo T($vv);?>
						</option>
				<?php } ?>
			<?php } ?>
			</select>
		<?php break;
		case WIDGET_DATE:
			preg_match_all("/[[:digit:]]{2,4}/", $value, $matches);
			$nums = $matches[0]; ?>
			<input name="day" class="day" value="<?php echo @$nums[0];?>"> .
			<input name="month" class="month" value="<?php echo @$nums[2];?>"> .
			<input name="year" class="year" value="<?php echo @$nums[3];?>">
			<?php /*?>
			<select name="day" class="day">
				<?php for($i=1;$i<32;$i++) { ?>
					<option value="<?php echo $i;?>"<?php if($i==@$nums[0]) echo ' selected="selected"';?>><?php echo $i;?>
				</option>
				<?php } ?>
			</select>
			<select name="month" class="month">
				<?php for($i=1;$i<13;$i++) { ?>
					<option value="<?php echo $i;?>"<?php if($i==@$nums[1]) echo ' selected="selected"';?>><?php echo T("mon_$i");?>
				</option>
				<?php } ?>
			</select>
			<select name="year" class="year">
				<?php for($i = date('Y'); $i > 1920; $i--) { ?>
					<option value="<?php echo $i;?>"<?php if($i==@$nums[2]) echo ' selected="selected"';?>><?php echo $i;?>
				</option>
				<?php } ?>
			</select>
		<?php */ break;


		case WIDGET_TIME:
			preg_match_all("/[[:digit:]]{2,4}/", $value, $matches);
			$nums = $matches[0]; ?>
			<input type="text" class="date" name=<?php echo $prefix;?>[<?php echo $key;?>][h] value="<?php echo (isset($nums[0])?$nums[0]:date("G"));?>" size=2>:
			<input type="text" class="date" name=<?php echo $prefix;?>[<?php echo $key;?>][mi] value="<?php echo (isset($nums[1])?$nums[1]:date("i"));?>" size=2>:
			<input type="text" class="date" name=<?php echo $prefix;?>[<?php echo $key;?>][s] value="<?php echo (isset($nums[2])?$nums[2]:date("s"));?>" size=2>(HH:MM:SS)

		<?php break;


		case WIDGET_DATETIME:
			preg_match_all("/[[:digit:]]{2,4}/", $value, $matches);
			$nums = $matches[0]; ?>
			<input type="text" class="date year" name="<?php echo $prefix;?>[<?php echo $key;?>][y]"
				value="<?php echo (isset($nums[0])?$nums[0]:date("Y"));?>" size="4">-
			<select name="<?php echo $prefix;?>[<?php echo $key;?>][m]>">
				<?php if(!isset($nums[1])) $nums[1] = date("m");
				for($i=1;$i<13;$i++) { ?>
					<option value="<?php echo $i;;?>"<?php if($i==@$nums[1]) echo ' selected="selected"';?>><?php echo T("mon_$i");?>
				</option>
				<?php } ?>
			</select>
			<input type="text" class="date" name=<?php echo $prefix;?>[<?php echo $key;?>][d] value="<?php echo (isset($nums[2])?$nums[2]:date("d"));?>" size=2> (YYYY-MM-DD) &nbsp&nbsp&nbsp
			<input type="text" class="date" name=<?php echo $prefix;?>[<?php echo $key;?>][h] value="<?php echo (isset($nums[3])?$nums[3]:date("G"));?>" size=2>:
			<input type="text" class="date" name=<?php echo $prefix;?>[<?php echo $key;?>][mi] value="<?php echo (isset($nums[4])?$nums[4]:date("i"));?>" size=2>:
			<input type="text" class="date" name=<?php echo $prefix;?>[<?php echo $key;?>][s] value="<?php echo (isset($nums[5])?$nums[5]:date("s"));?>" size=2>(HH:MM:SS)

		<?php break;

		case WIDGET_FILE: ?>
					<input type="file" id="<?php echo $key;?>" name="<?php echo $key;?>">
				<?php  if(isset($field['path'])) {
					$img = getImg($field['path'], $id);
					if($img) {
						echo "<br><img src='" . $img ."?rand=" . rand() ."' class=thumb>";
					}
				}
				break;

		case WIDGET_CHECKBOXES:
			$i = 0;
			$dat = array_flip(explode(",",@$data[$key]));?>
			<div>
			<?php foreach (@$options[$key] as $kk => $vv){
				if($i % 10 == 0){  ?>
					</div><div style="float:left;border:1px black solid;">
				<?php } ?>
				<p><input type="checkbox" value="$kk" name="<?php echo $prefix;?>[<?php echo $key;?>][]"
					<?php if(isset($dat[$kk])) echo " checked";?>><?php echo T($vv);?></p>
				<?php $i++;
			} ?>
			</div>
		<?php break;

		case WIDGET_MARKDOWN: ?>
		<?php echo T($key);?>:<br>
		<form enctype="multipart/form-data" id="img_form" method="post">
		<input type="file" id="<?php echo $key;?>_fupload" class="fupload">
		</form>
		<textarea<?php if($required) echo " required";?> class="md" cols="100" rows="10"
			name="<?php echo $prefix;?>[<?php echo $key;?>]"
			id="<?php echo $key;?>"><?php echo $value;?></textarea>
		<script>
		$(document).ready(function() {
			var _editor;
			
			function getEditor() {
				console.log(_editor);
				return _editor;
			}	

			var simplemde_<?php echo $key;?> = new SimpleMDE({ 
				element: $("#<?php echo $key;?>")[0], 
				forceSync: true,
				autosave: { 
					enabled: true, 
					uniqueId: <?php echo $key;?>
				},
				toolbar: [
					"bold",
					"italic",
					"strikethrough",
					"|",
					"heading",
					"quote",
					"horizontal-rule",
					"|",
					"link",
					{
						name: "image",
						action: function insertYoutube(editor){
							var url = prompt('Введите URL'); 
							_editor = editor;
							$.post('<?php echo BASE_URL;;?>posts/upimgurl', {
								'img': url
							}).done(function( data ) { console.log(data);
								var text = '![](' + data + ')';
								pos = _editor.codemirror.getCursor();
								_editor.codemirror.setSelection(pos, pos);
								_editor.codemirror.replaceSelection(text);	
							});
						},
						className: "fa fa-image",
						title: "Insert Image",
					},
					{
						name: "upimg",
						action: function uploadImage(editor){
							_editor = editor;
							$('#<?php echo $key;?>_fupload').trigger('click'); 
						},
						className: "fa fa-upload",
						title: "Upload image",
					},
					{
						name: "youtube",
						action: function insertYoutube(editor){
							var url = prompt('Введите URL'); 
							url = parseYoutubeUrl(url);
							var text = '<iframe width="1200" height="677" src="https://www.youtube.com/embed/' + url + '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
							$('#img_url').val('https://img.youtube.com/vi/' + url + '/maxresdefault.jpg');
							pos = editor.codemirror.getCursor();
							editor.codemirror.setSelection(pos, pos);
							editor.codemirror.replaceSelection(text);	
						},
						className: "fa fa-youtube",
						title: "Insert Youtube",
					},
					"|",
					"table",					
					"unordered-list",
					"ordered-list",
					"|",
					"preview",
					"side-by-side",
					"guide"
				]
			});

			$('#<?php echo $key;?>_fupload').on('change', function(){

				var formData = new FormData();
				// HTML file input, chosen by user
				formData.append("img", this.files[0]);
				var request = new XMLHttpRequest();
				request.open("POST", "<?php echo BASE_URL;?>posts/upimg", true);
				request.send(formData);
				request.onreadystatechange = function() { 
					if (request.readyState != 4) return;
					if (request.status != 200) {
						console.log(request.status + ': ' + request.statusText);
					} else {
						console.log(request.responseText); 
						var _editor = getEditor();
						var text = '![](' + request.responseText + ')';
						pos = _editor.codemirror.getCursor();
						_editor.codemirror.setSelection(pos, pos);
						_editor.codemirror.replaceSelection(text);	
					}
				}
			});

		});
		</script>
		<?	

	} ?>
	<label for="<?php echo $key;?>"></label>
	<?php if ($widget == WIDGET_CHECKBOX ) echo T($key) . ($required ? "<sup>*</sup>":'');?>
	</td>
	</tr>

	<?php if($split == $key) { ?>
		</table>
		</div>
		<div class="half half2">
		<table>
	<?php } ?>
<?php }?>
