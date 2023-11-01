@if(session()->has('mensagem'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)" x-show="show"
        style="position: fixed;
        display: block;
        position: absolute;
        top: 3%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: #B3FF00;
        text-align: center;
        font-size: 30px;
        border-radius: 10px;">
        {{ session('mensagem') }}
    </div>
@endif