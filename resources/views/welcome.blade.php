@extends('layouts.app')
    @section('content')
    <section id="about">
        <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
            <h2>About this application</h2>
            <p class="lead">This is a microservice application for image resizing.
                 The documentation is below, but you can find more api documentation at our
                   <a href="https://app.swaggerhub.com/apis-docs/Team-thanos/Team-thanos/0.0.1-oas3#/">Swagger docs</a>.
            </p>
            </div>
        </div>
        </div>
    </section>

    <section id="services" class="bg-light">
        <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
            <h2>Image resizing</h2>
            <p class="lead">Simply upload an image with resize parameters height and width, and obtain a link to download the uploaded file.</p>
            </div>
        </div>
        </div>
    </section>

    <section id="usage">
        <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
            <h2>Usage</h2>
            <p class="lead">
                Send a POST request to
                <a href="#">https://imageresize.microapi.dev/v1/upload</a> with the following payload: <br>
                <pre>
                payload:
                {
                “image”: “file”,
                “width”: 0,
                “height”: 0,
                }</pre>
                <br>
            </p>
            <p class = "lead">
                Description: This endpoint takes an image in parameters, and resizes according to the height and width provided.
                Note that the image should not be more than 2mb, and the width and height parameters should be between 0 and 10001.

                <br>
                <br>
                Send a GET request to
                <a href="#">https://imageresize.microapi.dev/v1/download/{filename}</a><br>
                Makes file available for download at the specified url
                <br>
                Description: This endpoint makes the resized image available for download at the specified url
            </p>
            </div>
        </div>
        </div>
    </section>
    @stop


