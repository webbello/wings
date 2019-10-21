<!--==========================
    Call To Action Section
============================-->
<section id="photo_gallery" class="wow fadeIn pl-3 pr-3">
    {{-- {{dd($photos)}} --}}
    <div class="text-center">
    <gallery-component :photos="{{$photos}}"></gallery-component>
    </div>
</section><!-- #call-to-action -->