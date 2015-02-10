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
					<img src="{{ $cat->image }}" alt="{{ $cat->name }}" title="{{ $cat->name }}"/>
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
				<strong>Memorial worlds <span style="float: right;"><input type="checkbox" name="hide_memorial_worlds"/> Hide</span></p></strong>
				<ul class="controler-tab-memorial-worlds">
					<li class='active'><a href="javascript:" data-tabs="tab-memorial-worlds-1">Line 1</a></li>
					<li><a href="javascript:" data-tabs-action="newtab" data-key-tab="memorial_worlds"><i class="fa fa-plus"></i></a></li>
				</ul>
				<div class="content-tab active" data-content-tabs="tab-memorial-worlds-1">
					<div class="content-tab-inner row-full-all content-memorial-worlds">
						<p class="content-content-relative">
							<input name="memorial-worlds" type="text" placeholder="Memorial worlds" style="width: 285px;">
							
						</p>
					</div>
				</div>
			</div>
			<button class="btn btn-custom-design btn-custom-design-bg" type="button" onclick="addPoem(this)">
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
						@foreach(['#FFE100', '#333333', '#FFFFFF'] as $k=>$c)
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
					<ul>
						<!-- 
						@foreach(['Garamond Italic Bold', 'Bookman Old Style Bold Italic'] as $k=>$f)
						<?php $checked = ($k == 0)? "checked=''" : ""; ?>
						<li style="font-family: {{ $f }}"><input type="radio" name="font-family" value="{{ $f }}" {{ $checked }}/> {{ $f }}</li>
						@endforeach 
						-->
						<li style="font-family: Garamond Italic Bold; font-size: 18px; font-style: italic; font-weight: 700; color: #333;"><input type="radio" name="font-family" value="Garamond" checked="true"/> Garamond Italic Bold</li>
						<li style="font-family: Bookman Old Style Bold Italic; font-size: 17px; font-style: italic; font-weight: 600; color: #333;"><input type="radio" name="font-family" value="Bookman" checked="true"/> Bookman Old Style Bold Italic</li>
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
					<img src="{{ $item->image }}"/>
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
	</div>
</div>
