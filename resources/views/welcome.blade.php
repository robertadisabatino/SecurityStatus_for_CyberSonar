<x-layout>

    <div class="container-fluid first-container">

        <img class="img-bg" src="/media/background.jpg" alt="">
        <div class="container second-container d-flex flex-column justify-content-center align-items-center">
            
            <div class="row mt-5 " data-aos="fade-right" data-aos-duration="1000">
                <div class="col-12 ">
                    <h1 class="text-center mt-5 section-border p-3"> {{__('ui.title')}} </h1>
                    <p class="p-2 fs-6 text-center lh-lg">{{__('ui.paragraph_1')}}</p>
                </div>
            </div>
            
            <div class="row">
                <div class="col-12 d-flex justify-content-end">
                    <a href="{{route('dashboard')}}" class="btn-custom-welcome">
                        {{__('ui.cta_button')}}
                    </a>
                </div>
            </div>
        </div>

    </div>
    
    
</x-layout>