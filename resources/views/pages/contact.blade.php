@extends("layouts.main")

@section("content")
<section class="section section-sm">
    <div class="shell-wide">
        @isset($isOkay)
            <div class="alert alert-success" role="alert">
                Ваше сообщение успешно отправлено! В ближайшее время Вы получите ответ от администратора на указанный адрес электронной почты.
            </div>
        @endisset
        <div class="hotel-booking-form">
            <h3>Контактная форма</h3>
            <!-- RD Mailform-->
            <form class="rd-mailform" method="post" action="{{ route("client.form.contact") }}">
                {{ @csrf_field() }}
                <div class="range range-sm-bottom spacing-20">
                    <div class="cell-lg-6 cell-md-12">
                        <p class="text-uppercase">Ваше имя</p>
                        <div class="form-wrap">
                            <input class="form-input" id="contact-first-name" type="text" name="name">
                            <label class="form-label" for="contact-first-name">Полное имя</label>
                            @if($errors->has("name"))
                                <span class="form-validation">{{ $errors->first("name") }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="cell-lg-6 cell-md-12">
                        <p class="text-uppercase">E-mail</p>
                        <div class="form-wrap">
                            <label class="form-label form-label-icon" for="email-contact"><span>Ваш e-mail</span></label>
                            <input class="form-input" type="text" id="email-contact" name="email">
                            @if($errors->has("email"))
                                <span class="form-validation">{{ $errors->first("email") }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="cell-lg-12 cell-md-12">
                        <p class="text-uppercase">Сообщение</p>
                        <div class="form-wrap">
                            <label class="form-label form-label-icon" for="message-contact"><span>Введите Ваше сообщение</span></label>
                            <textarea class="form-input" id="message-contact" name="message"></textarea>
                            @if($errors->has("message"))
                                <span class="form-validation">{{ $errors->first("message") }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="cell-sm-12">
                        <div class="form-wrap">
                            <div>
                                {!! htmlFormSnippet() !!}
                            </div>
                        </div>
                    </div>
                    <div class="cell-lg-2 cell-md-4 cell-sm-12">
                        <button class="button button-primary button-square button-block button-effect-ujarak" id="button-near-recaptcha" type="submit" disabled><span>Отправить</span></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
