@extends('template.base')
@section('content')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('{{ asset('frontend/img/post-bg.jpg') }}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="page-heading">
                        <h1>Write Your Post</h1>
                        <span class="subheading">Explore your mind with interesting ideas.</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <p>Want to get in ideas? Write a blog below and we will get back to you as soon as
                    possible!</p>
                <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
                <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
                <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
                <form action="{{ route('blog-post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Title</label>
                            <input type="text" class="form-control" placeholder="Title" required
                                data-validation-required-message="Please enter a title.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Category</label>
                            <select class="form-control" name="category_id">
                                <option>Technology</option>
                                <option>Experiment</option>
                                <option>Science</option>
                                <option>Travel</option>
                                <option>Others</option>
                                <select>
                        </div>
                    </div>
                    <br>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Blog</label>
                            <textarea rows="5" class="form-control" placeholder="Your Blog" required
                                data-validation-required-message="Please enter Your Blog."></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Image</label>
                            <input type="file" class="form-control" placeholder="Image" required
                                data-validation-required-message="You have to select an image.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <button type="submit" class="btn btn-primary" id="sendMessageButton">Post Blog</button>
                </form>
            </div>
        </div>
    </div>

    <hr>
@endsection
