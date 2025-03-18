<div>
    @auth

        <!-- Botó de Log Out al costat dret -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-sm text-blue-500 hover:text-blue-700">
                {{ __('Log Out') }}
            </button>
        </form>
    @else
        <div>No has iniciat sessió</div>
    @endauth
</div>
