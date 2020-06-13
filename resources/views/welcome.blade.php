
@extends('layouts.app')

@section('styles')
<link href = 'https://cdnjs.cloudflare.com/ajax/libs/swagger-ui/3.26.1/swagger-ui.min.css' rel = "stylesheet" />
@endsection

@section('scripts')
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/swagger-ui/3.26.1/swagger-ui-bundle.min.js"></script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/swagger-ui/3.26.1/swagger-ui-standalone-preset.min.js"></script>
    <script>
        window.onload = function() {
        const ui = SwaggerUIBundle({
            url: "/swagger/openapi.json",
            dom_id: '#swagger-ui',
            presets: [
                SwaggerUIBundle.presets.apis,
                SwaggerUIStandalonePreset
            ]
        })

        window.ui = ui
        }
    </script>
    <!-- <script>
        window.location.href = "https://app.swaggerhub.com/apis-docs/Team-thanos/Team-thanos/1.0.0"
    </script> -->
@endsection

    <!-- @section('content') -->
    <!-- <section id="about">
        <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
            <h2>About this application</h2>
            <p class="lead">This is a microservice application for image resizing.
                 Scroll down for the documentation, or go to our
                   <a href="https://app.swaggerhub.com/apis-docs/Team-thanos/Team-thanos/1.0.0">Swagger docs</a>.
            </p>
            </div>
        </div>
        </div>
    </section> -->

    <!-- <section id="services" class="bg-light">
        <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
            <h2>Image resizing</h2>
            <p class="lead">Simply upload an image with resize parameters height and width, and obtain a link to download the uploaded file.</p>
            </div>
        </div>
        </div>
    </section> -->

    <div>
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div id="swagger-ui"></div>
            </div>
        </div>
    </div>
    @stop
