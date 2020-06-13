@extends('layouts.app')
    @section('content')
    <section id="about">
        <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
            <h2>About this application</h2>
            <p class="lead">This is a microservice application for image resizing application.
                 You can find out more about api documentation at:
                   <a href="#">Swagger docs</a>.
            </p>
            </div>
        </div>
        </div>
        </section>

        <section id="services" class="bg-light">
        <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
            <h2>Service we offer: Image resizing</h2>
            <p class="lead">Simply upload an image with resize paramters height and width, and obtain a link to download the uploaded file.</p>
            </div>
        </div>
        </div>
        </section>

        <section id="usage">
            <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                <h2>How to use this application</h2>
                <p class="lead">
                    Send a POST request to
                    <a href="#">https://baseurl/api/upload</a> with the payload <br>
                    payload:
                    {
                    “image”: “file”,
                    “width”: 0,
                    “height”: 0,
                    }
                    <br>
                    Description: This endpoint takes image in parameters, and resizes according to the height and width provided.
                    The image should not be more than 2mb and the width and height parameters should be between 0 and 10001

                    <br>
                    <br>
                    Send a GET request to
                    <a href="#">https://baseurl/api/dowload{filename}</a><br>
                    Makes file available for download at the specified url
                    Description: This endpoint makes file available for download at the specified url
                </p>
                </div>
            </div>
            </div>
            </section>
    @stop


