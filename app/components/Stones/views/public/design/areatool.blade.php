<?php
	$user = \Sentry::getUser();
	// print_r($user['id']);
?>
<div class="content-area-tool js-tabs">
	<ul class="controler-tab">
		<li class='active'><a href="javascript:" data-tabs="tab-gravestones">1.Gravestones</a></li>
		<li><a href="javascript:" data-tabs="tab-text">2.Text</a></li>
		<li><a href="javascript:" data-tabs="tab-accessories">3.Accessories</a></li>
		<li><a href="javascript:" data-tabs="tab-finish">4.Finish</a></li>
	</ul>
	<!-- Gravestones -->
	<div class="content-tab center active" data-content-tabs="tab-gravestones">
		<div class="product-search-content">
			<input type="text" name="psearch" placeholder="Search"/>
		</div>
		@if(count($productCategories) > 0)
		<ul class="product-cat-content">
			@foreach($productCategories as $cat)
			<li>
				<a href="javascript:" data-cat-id="{{ $cat->id }}" title="{{ $cat->name }}">
					<img src="<?php echo Request::root().'/'; ?>{{ $cat->image }}" alt="{{ $cat->name }}" title="{{ $cat->name }}"/>
					<p>{{ $cat->name }}</p>
				</a>
			</li>
			@endforeach
		</ul>
		@endif
		<div class="line-design"></div>
		<div class="content-products">
			<!-- Ajax load item -->
		</div>
	</div>
	<!-- Text -->
	<div class="content-tab center" data-content-tabs="tab-text">
		<div class="content-text">
			<div class="control-row row-full-all">
				<p><strong>First text</strong> <span style="float: right;"><input type="checkbox" name="hide_first_text"/> Hide</span></p>
				<p class="content-content-relative content-first-text-field">
					<input name="first_text" type="text" style="width: 300px;">
				</p>
			</div>

			<div class="control-name js-tabs">
				<ul class="controler-tab-name">
					<li class='active'><a href="javascript:" data-tabs="tab-name-1"><i class='fa fa-user'></i> Name 1</a></li>
					 <li><a href="javascript:" data-tabs-action="newtab" data-key-tab="name"><i class="fa fa-plus"></i></a></li>
				</ul>
				<div class="content-tab active" data-content-tabs="tab-name-1">
					<div class="content-tab-inner row-full-all">
						<p class="content-content-relative content-name--field">
							<input type="text" name="name" placeholder="Name" style="width: 285px;" >
						</p>
						<button class="btn btn-custom-design" type="button" onclick="addJobOrPlace(this)">
							<i class="fa fa-plus-circle"></i> Add job title / place or birth
						</button>

						<p class="control_add_job_or_place content-content-relative" style="display: none;">
							<!-- <p class="content-content-relative"> -->
								<input type="text" name="add_job_or_place" style="width: 240px;"/>	
								<button class="design-custom-btn" type="button" onclick="delJobOrPlace(this)">
									<i class="fa fa-trash"></i>
								</button>
							<!-- </p> -->
						</p>

						<div class="b-d-date content-content-relative">
							<div class="b-date">
								<strong style="color: #333;">Birthday</strong> </br>
								<input type="text" name="b-d" placeholder="dd" maxlength="2"> - 
								<input type="text" name="b-m" placeholder="mm" maxlength="2"> - 
								<input type="text" name="b-y" placeholder="yyyy" maxlength="4">
							</div>
							<div class="d-date">
								<strong style="color: #333;">Death</strong> </br>
								<input type="text" name="d-d" placeholder="dd" maxlength="2"> - 
								<input type="text" name="d-m" placeholder="mm" maxlength="2"> - 
								<input type="text" name="d-y" placeholder="yyyy" maxlength="4">
							</div>
							<p></p>
						</div>
						<label>
							<input type="checkbox" name="expect_to_add_another_namelater"> 
							Expect to add another name later
						</label>
					</div>
				</div>
			</div>
			<p></p>
			<div class="control-memorial-worlds js-tabs">
				<strong>Memorial words <span style="float: right;"><input type="checkbox" name="hide_memorial_worlds"/> Hide</span></p></strong>
				<ul class="controler-tab-memorial-worlds">
					<li class='active'><a href="javascript:" data-tabs="tab-memorial-worlds-1">Line 1</a></li>
					<li><a href="javascript:" data-tabs-action="newtab" data-key-tab="memorial_worlds"><i class="fa fa-plus"></i></a></li>
				</ul>
				<div class="content-tab active" data-content-tabs="tab-memorial-worlds-1">
					<div class="content-tab-inner row-full-all content-memorial-worlds">
						<p class="content-content-relative">
							<input name="memorial-worlds" type="text" placeholder="Memorial words" style="width: 285px;">
							
						</p>
					</div>
				</div>
			</div>
			<button class="btn btn-custom-design btn-custom-design-bg btn-poem-js" type="button" onclick="addPoem(this)">
				<i class="fa fa-plus-circle"></i> Add a poem
			</button>
			<div class="control-poem js-tabs" style="display: none;">
				<p></p>
				<strong>Poem</strong>
				<ul class="controler-tab-poem">
					<li class='active'><a href="javascript:" data-tabs="tab-poem-1">Line 1</a></li>
					<li><a href="javascript:" data-tabs-action="newtab" data-key-tab="poem"><i class="fa fa-plus"></i></a></li>
				</ul>
				<div class="content-tab active" data-content-tabs="tab-poem-1">
					<div class="content-tab-inner row-full-all ">
						<p class="content-content-relative content-poem">
							<input name="poem" type="text" placeholder="Poem" style="width: 245px">
							<button class="design-custom-btn" type="button" onclick="hidePoen(this)"><i class="fa fa-trash"></i></button>
							
						</p>
					</div>
				</div>
			</div>

			<div class="control-row row-full-all content-color-fonttype">
				<div style="width: 40%;">
					<p><strong>Color</strong></p>
					<ul class="content-color-text">
						<?php 
							$_colors = array();
							foreach($colors as $k=>$item){
								array_push($_colors, $item->hexcode);
							}
						?>
						@foreach(['#000000', '#FFFFFF', '#C0C0C0', '#FFD700', '#CD7F32'] as $k=>$c)
							<?php  $checked = ($k == 0)? "checked=''" : ""; ?>
						<li>
							<label>
								<input style="display: none;" type="radio" name="text-color" value="{{ $c }}" {{ $checked }}/>
								<span class="text-color-item" href="javascript:" style="background: {{ $c }}"></span>
							</label>
						</li>
						@endforeach
					</ul>
					<div><input type="radio" name="color_text" id="painted_text"/> Painted text</div>
					<div><input type="radio" name="color_text" id="permanent_text" checked=""/> Permanent text?</div>
				</div><!--
				--><div style="width: 60%;">
					<p><strong>Font type</strong></p>
					<ul class="control-fonts-content">
						<!-- 
						@foreach(['Garamond Italic Bold', 'Bookman Old Style Bold Italic'] as $k=>$f)
						<?php $checked = ($k == 0)? "checked=''" : ""; ?>
						<li style="font-family: {{ $f }}"><input type="radio" name="font-family" value="{{ $f }}" {{ $checked }}/> {{ $f }}</li>
						@endforeach 
						-->
						<li style="font-family: garamonditalic; font-size: 18px; font-style: italic; font-weight: 700; color: #333;"><input type="radio" name="font-family" value="garamonditalic" checked="true"/> Garamond</li>
						<li style="font-family: bookosbi; font-size: 17px; font-style: italic; font-weight: 600; color: #333;"><input type="radio" name="font-family" value="bookosbi"/> Bookman</li>
						<li><label><input type="checkbox" id="move_all_text"> <strong>Move All Text</strong></label></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- Accessories -->
	<div class="content-tab center" data-content-tabs="tab-accessories">
		<div class="product-search-content">
			<input type="text" placeholder="Search" name="accessories_search">
		</div>
		<div class="accessories-cat-content">
			@if(count($iconcategories) > 0)
				<ul>
				@foreach($iconcategories as $item)
				<li class="item-accessories" data-id="{{ $item->id }}">
					<img src="<?php echo Request::root().'/'; ?>{{ $item->image }}"/>
					<p class="text-ellipsis">{{ $item->name }}</p>
				</li>
				@endforeach
				</ul>
			@endif
		</div>
		<div class="accessories-content">
			<button type="button" class="btn" id="btn-accessories-back"><i class="fa fa-arrow-left"></i> Back</button>
			<div class="accessories-content-inner">
				<!-- content ajax -->
			</div>
		</div>
	</div>
	<div class="content-tab center" data-content-tabs="tab-finish">
		<h1>Finish</h1>
		<div class="content-btn-control">
			<div id="btn_download_pdf" class="btn-control download-pdf">
				<div class="icon-control icon-download-pdf"></div>
				<strong>Download PDF</strong>
			</div>
			<div id="btn_print_design" class="btn-control print-design">
				<div class="icon-control icon-print-design"></div>
				<strong>Print Design</strong>
			</div>
			<div class="btn-control share-design">
				<div id="btn_share_design" class="icon-control icon-share-design"></div>
				<strong>SHARE!</strong>
			</div>
		</div>
		<?php if(!isset($user['id'])){ ?>
		<div class="user-control">
			<div class="content-form-signup">
				<h1>Sign Up</h1>
				<p>Already a member? <a href="javascript:void(0)" onClick="switchForm(this, 'signin')">Sign in >></a></p>
				<form action="<?php echo Request::root(); ?>/register" method="POST" id="design-form-signup">
					<?php echo Form::token(); ?>
					<input id="designform_username" type="hidden" name="username" value="">
					<p><input id="designform_email" type="email" name="email" placeholder="E-mail" required></p>
					<p><input type="password" name="password" placeholder="Select Password" required></p>
					<p><input type="password" name="password_confirmation" placeholder="Re-type Password" required></p>
					<input type="hidden" name="return_url" value="">
					<p>
						<button id="btn-use-sign-up" class="btn-use-sign-up" type="button">Sign up</button>
						<button id="btn-use-sign-up-submit" class="btn-use-sign-up" type="submit" style="display:none;"></button>
					</p>
				</form>
				<p>·  Or sign up using  ·</p>
				<div class="sign-up-social">
					<span id="btn-fb-login">
						<a data-href="<?php echo Request::root(); ?>/social/facebook/login">
							<img src="<?php echo Request::root(); ?>/assets/public/exception/design/images/u155.png">
						</a>
					</span>
					<span id="btn-tw-login">
						<a data-href="<?php echo Request::root(); ?>/social/twitter/login">
							<img src="<?php echo Request::root(); ?>/assets/public/exception/design/images/u159.png">
						</a>
					</span>
					<span id="btn-g-login">
						<a data-href="<?php echo Request::root(); ?>/social/google/login">
							<img src="<?php echo Request::root(); ?>/assets/public/exception/design/images/u157.png">
						</a>
					</span>
				</div>
				<div class="info-text-sigup">
					<h4>Why Sign Up?</h4>
					<p>Save Stone Designs & edit whenever you want!</p>
					<p>Invite friends & family to join Stone design with a private forum.</p>
					<p>Discuss with friends & family about design and give them opportunity to edit and comment all stone designs.</p>
				</div>
			</div>
			<div class="content-form-signin" style="display: none;">
				<h1>Sign In</h1>
				<p>Already a login? <a href="javascript:void(0)" onClick="switchForm(this, 'signup')">Sign up >></a></p>
				<form class="form-signin" id="design-form-signin" accept-charset="UTF-8" action="<?php echo Request::root(); ?>/login/design" method="POST">
					<?php echo Form::token(); ?>
					<p><input class="input-block-level" type="text" name="username" placeholder="Username"></p>
					<p><input class="input-block-level" type="password" value="" name="password" placeholder="Password"></p>
					<input type="hidden" name="return_url" value="">
					<p>
						<button id="btn-use-sign-in" class="btn-use-sign-in" type="button">Login</button>
						<button id="btn-use-sign-in-submit" class="btn-use-sign-in" type="submit" style="display:none;"></button>
					</p>
				</form>
			</div>
		</div>
		<?php }else{
		echo "<div class='' style='margin-top: 30px;'><strong>Hi, ". $user['username'] ."</strong></div>";
		echo "<br/><button style='padding: 16px 20px;text-transform: uppercase;' id='save_design'>Save Design</button>";
		}?>

	</div>
</div>
