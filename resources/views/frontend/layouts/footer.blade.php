@section('footer')
<div class="probootstrap-page-wrapper">
    <footer class="probootstrap-footer probootstrap-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="probootstrap-footer-widget">
                        <h3>About The School</h3>
                        @foreach($aboutData as $key => $about)
                            <p>{{$about->about}}</p>
                        @endforeach
                        <p><a href="{{route('about-us')}}" class="btn btn-primary">Learn More</a></p>
                    </div>
                </div>
                <div class="col-md-3 col-md-push-1">
                    <div class="probootstrap-footer-widget">
                        <h3>Links</h3>
                        <ul>
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li><a href="{{route('subject')}}">Subjects</a></li>
                            <li><a href="{{route('teachers')}}">Teachers</a></li>
                            <li><a href="#">News</a></li>
                            <li><a href="{{route('contact-us')}}">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="probootstrap-footer-widget">
                        <h3>Contact Info</h3>
                        <ul class="probootstrap-contact-info">
                            <li><i class="icon-location2"></i> <span>198 West 21th Street, Suite 721 New York NY 10016</span></li>
                            <li><i class="icon-mail"></i><span>info@domain.com</span></li>
                            <li><i class="icon-phone2"></i><span>+123 456 7890</span></li>
                        </ul>
                    </div>
                </div>

            </div>
            <!-- END row -->

        </div>

        <div class="probootstrap-copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 text-left">
                        <p>&copy; 2019 <a href="https://uicookies.com/">uiCookies:Enlight</a>. All Rights Reserved. Designed &amp; Developed with <i class="icon icon-heart"></i> by <a href="https://uicookies.com/">nirajan rai</a></p>
                    </div>
                    <div class="col-md-4 probootstrap-back-to-top">
                        <p><a href="#" class="js-backtotop">Back to top <i class="icon-arrow-long-up"></i></a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
    @stop