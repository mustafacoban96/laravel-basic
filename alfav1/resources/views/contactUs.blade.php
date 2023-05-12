@extends('layouts.app')

@section('title')
    Contact Us
@endsection




@section('content')
    <div class="contact-content">
        <div class="contact-map-area">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3182.4542152789963!2d37.38186197561624!3d37.09430397216481!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1531e475334fdcd1%3A0xaf3b7f9b00d9406e!2sMerve%C5%9Fehir%20Telekom!5e0!3m2!1str!2str!4v1683790124727!5m2!1str!2str" width="600" height="500" style="border:0; " allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="contact-form">
            <form action="">
                @csrf
                <Select>
                    <option value="">--Please select product--</option>
                    <option value="">Baklava Çantası</option>
                    <option value="">Alışveriş Çantası</option>
                    <option value="">Pazar Çantası</option>
                </Select>

                <input type="text"  placeholder="Name Surname">
                <input type="text"  placeholder="Phone Number">
                <input type="email" placeholder="Email">
                <textarea id="w3review" placeholder="You can write your message" rows="10"></textarea>
                <button type="submit">Send</button>
            </form>
        </div>
    </div>   
@endsection