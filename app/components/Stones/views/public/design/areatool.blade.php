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
				<a href="javascript:" data-cat-id="{{ $cat->id }}">
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
					<input name="first_text" type="text">
					<span class="content-font-size-control">
						<input type="text" class="font-size-control font-size-name" name="font-size-name" />
					</span>
				</p>
			</div>

			<div class="control-name js-tabs">
				<ul class="controler-tab-name">
					<li class='active'><a href="javascript:" data-tabs="tab-name-1">Name 1</a></li>
					 <li><a href="javascript:" data-tabs-action="newtab" data-key-tab="name"><i class="fa fa-plus"></i></a></li>
				</ul>
				<div class="content-tab active" data-content-tabs="tab-name-1">
					<div class="content-tab-inner row-full-all">
						<p class="content-content-relative content-name--field">
							<input type="text" name="name" placeholder="Name">
							<span class="content-font-size-control content-name--field">
								<input type="text" class="font-size-control font-size--name" name="font-size--name" />
							</span>
						</p>
						<button class="btn btn-custom-design" type="button" onclick="addJobOrPlace(this)">
							<i class="fa fa-plus-circle"></i> Add job title / place or birth
						</button>

						<p class="control_add_job_or_place content-content-relative" style="display: none;">
							<!-- <p class="content-content-relative"> -->
								<input type="text" name="add_job_or_place" style="width: 255px;"/>	
								<button class="design-custom-btn" type="button" onclick="delJobOrPlace(this)">
									<i class="fa fa-trash"></i>
								</button>
								<span class="content-font-size-control content-add-job-or-place-field">
									<input type="text" class="font-size-control font-size-add-job-or-place-field" name="font-size-add-job-or-place" />
								</span>
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
							<span class="content-font-size-control content-b-d-date-field">
								<input type="text" class="font-size-control font-size-b-d-date-field" name="font-size-b-d-date" />
							</span>
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
				<strong>Memorial worlds</strong>
				<ul class="controler-tab-memorial-worlds">
					<li class='active'><a href="javascript:" data-tabs="tab-memorial-worlds-1">Line 1</a></li>
					<li><a href="javascript:" data-tabs-action="newtab" data-key-tab="memorial_worlds"><i class="fa fa-plus"></i></a></li>
				</ul>
				<div class="content-tab active" data-content-tabs="tab-memorial-worlds-1">
					<div class="content-tab-inner row-full-all content-memorial-worlds">
						<p class="content-content-relative">
							<input name="memorial-worlds" type="text" placeholder="Memorial worlds">
							<span class="content-font-size-control content-memorial-worlds-field">
								<input type="text" class="font-size-control font-size-memorial-worlds-field" name="font-size-memorial-worlds" />
							</span>
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
							<input name="poem" type="text" placeholder="Poem" style="width: 252px">
							<button class="design-custom-btn" type="button" onclick="hidePoen(this)"><i class="fa fa-trash"></i></button>
							<span class="content-font-size-control content-poem-field">
								<input type="text" class="font-size-control font-size-poem-field" name="font-size-poem" />
							</span>
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
					<div><input type="checkbox" name=""/> Painted text</div>
					<div><input type="checkbox" name=""/> Permanent text?</div>
				</div><!--
				--><div style="width: 60%;">
					<p><strong>Font type</strong></p>
					<ul>
						@foreach(['Tahoma', 'Verdana'] as $k=>$f)
						<?php $checked = ($k == 0)? "checked=''" : ""; ?>
						<li style="font-family: {{ $f }}"><input type="radio" name="font-family" value="{{ $f }}" {{ $checked }}/> {{ $f }}</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- Accessories -->
	<div class="content-tab center" data-content-tabs="tab-accessories">
	<!--
		<div class="content-text">
			<textarea id="text-design" class="text-design"></textarea>
			<div class="control-text-format">
				<ul>
					<li>
						<input class="hidden" type="checkbox" id="fontweight" name="fontweight"/>
						<label for="fontweight"><i class="fa fa-bold"></i></label>
					</li>
					<li>
						<input class="hidden" type="checkbox" id="fontitalic" name="fontitalic"/>
						<label for="fontitalic"><i class="fa fa-italic"></i></label>
					</li>
					<li>
						<input class="hidden" type="radio" id="textalignleft" name="textalign" id="textalignleft" value="left"/>
						<label for="textalignleft"><i class="fa fa-align-left"></i></label>
					</li>
					<li>
						<input class="hidden" type="radio" id="textaligncenter" name="textalign" id="textaligncenter" value="center" checked="true" />
						<label for="textaligncenter"><i class="fa fa-align-center"></i></label>
					</li>
					<li>
						<input class="hidden" type="radio" id="textalignright" name="textalign" id="textalignright" value="right"/>
						<label for="textalignright"><i class="fa fa-align-right"></i></label>
					</li>
				</ul>
			</div>
			<div class="control-font-style">
				<?php if(count($fonts) > 0){
					$font_arr = array();
					foreach($fonts as $f){
						$font_arr[str_replace(" ", "+",$f)] = $f;
					}
				} ?>
				{{ Form::select('fonts', $font_arr, '', array('style' => 'width: 70%')) }}
				{{ Form::text('color', '#333'); }}
			</div>
			<div class="control-font-size">
				<p>Font size(px): <span id="js-ranger-fontsize-value" class="num-font-size"></span></p>
				<div id="js-font-size" data-size-default="30" data-size-start="12" data-size-end="100"></div>
			</div>
			<div class="line-design"></div>
			<button class="btn btn-add-text" id="add_text"><i class="fa fa-plus"></i> Add Text</button>
		</div>	
	-->
	</div>
	<div class="content-tab center" data-content-tabs="tab-finish">
		
	</div>
</div>