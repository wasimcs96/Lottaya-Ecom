@extends('frontend.layouts.app')

@section('content')

<section class="pt-4 mb-4">
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-6 text-center text-lg-left">
                <h1 class="fw-600 h4">FAQ</h1>
            </div>
            <div class="col-lg-6">
                <ul class="breadcrumb bg-transparent p-0 justify-content-center justify-content-lg-end">
                    <li class="breadcrumb-item opacity-50">
                        <a class="text-reset" href="http://localhost/shawn-ecommerce">Home</a>
                    </li>
                    <li class="text-dark fw-600 breadcrumb-item">
                        <a class="text-reset" href="http://localhost/shawn-ecommerce/faq">"FAQ"</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<div class="container">
<div class="mb-4 bg-white rounded shadow-sm overflow-hidden mw-100 text-left d-flex flex-column" style="padding: 395833333333333vw; color:#676767;">

<div class="container">
    <div class="row" style="
      background: #F95024;
  ">
        <div class="col-lg-6 col-md-10 mx-auto">
            <div class="site-heading">
                <h1>Hi,How Can We Help You?h1&gt;
                <span class="subheading">

                    <form class="form-inline my-4 my-lg-0">
                        <input class="form-control col-md-8 mr-sm-4" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Searchbutton&gt;
                    form&gt;
                span&gt;
            div&gt;
        div&gt;
    div&gt;
div&gt;


<div class="container py-3">
    <div class="row">
        <div class="col-10 mx-auto">
            <div class="accordion" id="faqExample">
                <h3>Hot Questionh3&gt;
                <div class="card">
                    <div class="card-header p-2" id="headingOne">

                        <h5 class="mb-0">
                            </h5></div></div></h3></div></div></div></div></button><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Q: How does this work?
                            button&gt;
                        h5&gt;
                    div&gt;

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqExample">
                        <div class="card-body">
                            <b>Answer:b&gt; It works using the Bootstrap 4 collapse component with cards to make a
                            vertical accordion that expands and collapses as questions are toggled.
                        div&gt;
                    div&gt;
                div&gt;
                <div class="card">
                    <div class="card-header p-2" id="headingTwo">
                        <h5 class="mb-0">
                            </h5></div></div></b></div></div></button><b><button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Q: What is Bootstrap 4?
                            button&gt;
                        h5&gt;
                    div&gt;
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqExample">
                        <div class="card-body">
                            Bootstrap is the most popular CSS framework in the world. The latest version released in
                            2018 is Bootstrap 4. Bootstrap can be used to quickly build responsive websites.
                        div&gt;
                    div&gt;
                div&gt;
                <div class="card">
                    <div class="card-header p-2" id="headingThree">
                        <h5 class="mb-0">
                            </h5></div></div></div></div></button><button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Q. What is another question?
                            button&gt;
                        h5&gt;
                    div&gt;
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqExample">
                        <div class="card-body">
                            The answer to the question can go here.
                        div&gt;
                    div&gt;
                div&gt;
                <div class="card">
                    <div class="card-header p-2" id="headingThree">
                        <h5 class="mb-0">
                            </h5></div></div></div></div></button><button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Q. What is the next question?
                            button&gt;
                        h5&gt;
                    div&gt;
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqExample">
                        <div class="card-body">
                            The answer to this question can go here. This FAQ example can contain all the Q/A that is
                            needed.
                        div&gt;
                    div&gt;
                div&gt;
            div&gt;

        div&gt;
    div&gt;
    
div&gt;
 @endsection

 @section('script')
<script type="text/javascript">
$(document).ready(function() {
    $('#paymentForm').submit()
});
script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
script>
@endsection</script></div></div></button></b></form></span></h1></div></div></div></div>

</div>
</div>
@endsection

@endsection