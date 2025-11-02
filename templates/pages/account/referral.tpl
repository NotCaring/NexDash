{include file='file:core/header.tpl'}
<div class="page-banner">
	<div class="page-banner-img">
		<img src="images/pages_banner.png" alt="Orbyss">
	</div>
	<div class="page-banner-content">
		<h1 class="page-banner-title">
			{$pagename}
		</h1>
	</div>
</div>
<div class="container-fluid">
	<div class="col-md-8 py-4">
		<div class="panel-body">
			<div class="page-header">
			<h2>Referral System
			</h2>
				<small>You can see here tutorials, video, media etc.</small>
			</div>
			
			<ul>
				<br>
				Hello <b style="text-transform:capitalize;">{$ref.login}</b><br><br>

				
				We provide new features for you <b>Referal System</b><br class="clearfloat">
				every time you invite your friends. you will receive a referal point.<br class="clearfloat">
				in short example if people registered with your Personal referal link <br class="clearfloat">
				or your banner you will obtain 1 point.
				<br>
				<br>

				<b>"The Registered Account Is Not Yours"</b><br>
				<b>"The Registered Account must have at least 3 days Online Time"</b><br>
				<b>"The Registered Account must be already on 2nd Job Class (Champion,Crusader,Sharpshooter,Cleric,Sealmaster,Voyager)" </b><br>
				<br>
				<br>
				Simple huh? 
				But NO don't even think about it =:) I know exactly what is on your mind right now, Duuh.. ! <br>
				Only active and very unique accounts will be counted, do not try to cheat ok?<br>
				Oh, if you still want to cheat sure go ahead! Nothing stops us from banning the cheaters! >:D<br>
				Tee..hee =:). Copy and Paste the link code below and spread them everywhere =:)<br>
				
				
				<br>
				<br>
				<br>
				<h4 style="text-align:center;font-size:13px;">
					Dimension Pirates Online Referal Link
				</h4>
				<br>
				<br>

			</ul>

			<center>
				<b>Personal Link Code</b>
				<ul>
					<p><input style="width:400px; type="text" name="ref_link" id="ref_link" class="bigfield" value="{$base_url}index.php?act=register&ref={$userid}" tabindex="1" readonly="{$base_url}index.php?act=register&ref={$userid}" /></p>
				</ul>
				<br>
				<br>
				
				<b>Forum Link Code</b>
				<ul>
					<textarea cols="50" rows="3" style="width:400px;height:50px;">[url={$base_url}index.php?act=register&ref={$userid}][img]http://www.url.com/banner.jpg[/img][/url]</textarea>
				</ul>
				<br>
				<br>

				<b>HTML Link Code</b>						
				<ul>
					<textarea cols="50" rows="3" style="width:400px;height:50px;"><a href="{$base_url}index.php?act=register&ref={$userid}"><img src="http://www.url.com/banner.jpg"></a></textarea>
				</ul>
			</center>
				<br>
				<br>						
			
		</div>		
	</div>
{include file='file:sidebars/right.tpl'}