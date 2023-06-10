


<div class="footer-container">
    <div class="foot">
       <div class="nested-foot">
            <h3>@lang('footer.1')</h3>
            <div class="nested-foot-title">
                <a href="#"><i class="fa fa-phone"></i>0531 969 48 82</a>
                <a href="#"><i class="fa fa-envelope"></i>alfa@bez.com.tr</a>
            </div>
            <div class="social-media">
                <a href="#" class="fa fa-facebook"></a>
                <a href="#" class="fa fa-twitter"></a>
                <a href="#" class="fa fa-youtube"></a>
                <a href="#" class="fa fa-instagram"></a>
                <a href="#" class="fa fa-linkedin"></a>
            </div>
        </div>
        <div class="nested-foot">
                <h3>@lang('footer.2')</h3>
                <P>@lang('footer.3')</P>
                <p>@lang('footer.4')</p>
                <p>@lang('footer.5')</p>
        </div>
       <div class="nested-foot">
            <h3>@lang('footer.6')</h3>
            @csrf
            <form  action="#">
                <div class="request-form">
                    <input type="text" name="name" placeholder="Name Surname">
                    <input type="text" name = "gsm" placeholder="Phone Number">
                    <input type="email" name="email"  placeholder="E-mail">
                    <button type="submit">Send</button>
                </div>
            </form>
       </div>
    </div>
    <div class="post-footer">
        <p>All rights reserved © 2023 Alfa Bag</p>
    </div>
    
</div>