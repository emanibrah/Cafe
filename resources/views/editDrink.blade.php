@extends('layouts.dashmain')

@section('pagecontent')

<!-- page content -->
<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Manage Beverages</h3>
						</div>

						<div class="title_right">
							<div class="col-md-5 col-sm-5  form-group pull-right top_search">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Search for...">
									<span class="input-group-btn">
										<button class="btn btn-default" type="button">Go!</button>
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Edit Beverage</h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
											<ul class="dropdown-menu" role="menu">
												<li><a class="dropdown-item" href="#">Settings 1</a>
												</li>
												<li><a class="dropdown-item" href="#">Settings 2</a>
												</li>
											</ul>
										</li>
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />

<form action="{{ route('updateDrink', [$drinks->id]) }}" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
    @csrf
    @method('put')

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Title <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
            <input type="text" id="title" required="required" class="form-control" name="title" value="{{ $drinks->title }}">
        </div>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="content">Content <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
            <textarea id="content" name="content" required="required" class="form-control">{{ $drinks->content }}</textarea>
        </div>
    </div>

    <div class="item form-group">
        <label for="price" class="col-form-label col-md-3 col-sm-3 label-align">Price <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
            <input id="price" class="form-control" type="number" name="price" required="required" value="{{ $drinks->price }}">
        </div>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Published</label>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="active" class="flat" {{ $drinks->active ? 'checked' : '' }}>
            </label>
        </div>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Special</label>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="special" class="flat" {{ $drinks->special ? 'checked' : '' }}>
            </label>
        </div>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Image <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
            <input type="file" id="image" name="image" class="form-control">
        </div>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="category">Category <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
            <select class="form-control" name="category_id" id="">
                <option value="">Select Category</option>
				
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $drinks->category_id ? 'selected' : '' }}>{{ $category->cate_name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="ln_solid"></div>
    <div class="item form-group">
        <div class="col-md-6 col-sm-6 offset-md-3">
            <button class="btn btn-primary" type="button">Cancel</button>
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </div>
</form>

			<!-- /page content -->  




@endsection