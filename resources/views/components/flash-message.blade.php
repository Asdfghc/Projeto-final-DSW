@if(session()->has('mensagem'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show"
        style="position: fixed;
        display: block;
        position: absolute;
        top: 3%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: #B3FF00;
        background-color: #0E0073;
        text-align: center;
        font-size: 30px;
        border-radius: 10px;
        padding: 18px 15px;">
        {{ session('mensagem') }}
    </div>
@elseif(session()->has('erro'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show"
        style="position: fixed;
        display: block;
        position: absolute;
        top: 3%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: red;
        background-color: #0E0073;
        text-align: center;
        font-size: 30px;
        border-radius: 10px;
        padding: 18px 15px;">
        {{ session('erro') }}
    </div>
@endif