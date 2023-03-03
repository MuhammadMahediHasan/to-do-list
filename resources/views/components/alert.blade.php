@if(session('success'))
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
         role="alert"
         x-data="{ show: true }"
         x-show="show"
         x-transition
         x-init="setTimeout(() => show = false, 2000)">
        <span class="font-medium">Success alert!</span> {{ session('success') }}.
    </div>
@endif
