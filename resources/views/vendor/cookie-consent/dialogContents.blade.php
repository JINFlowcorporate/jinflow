<div class="cookies-card js-cookie-consent cookie-consent ">
    <p class="title">
    {{ trans('cookie-consent::texts.title') }}
    </p>
    <p class="info">
        {!! trans('cookie-consent::texts.message') !!}
    </p>
    <button class="cta js-cookie-consent-agree cookie-consent__agree">
        {{ trans('cookie-consent::texts.agree') }}
    </button>
</div>

<style>
    .cookies-card {
        position: fixed;
        bottom: 2em;
        left: 2em;
        width: 350px;
        z-index: 9999;
        background-color: #8a817c;
        padding: 1.5em;
    }

    .cookies-card * {
        color: #fff;
    }

    .title {
        font-size: 1.6em;
        letter-spacing: 0.4px;
        margin-bottom: 0.5em;
    }

    .info {
        line-height: 1.4em;
        letter-spacing: 0.4px;
        margin-bottom: 2em;
    }

    .cta {
        border: none;
        outline: none;
        padding: 0.8em 1.5em;
        border-radius: 0.5rem
            /* 8px */
        ;
        background-color: #264461;
        font-size: 1.1em;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.4s;
    }

    .cta:hover {
        background-color: #3c9e66;
    }
</style>

<script>

</script>