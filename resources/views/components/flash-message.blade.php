@if(session()->has('mensagem'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
        style="position: fixed; top: 10px; translate: 400px; padding-top: 3; padding-bottom: 3; padding-left: 48; padding-right: 48; left: 0.5; background-color: #007330; color: white; text-align: center; font-size: 30px; border-radius: 10px;">
        {{ session('mensagem') }}
    </div>
@endif