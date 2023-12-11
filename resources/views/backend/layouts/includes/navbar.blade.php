<!-- NAVBAR -->
<nav>
    <i class='bx bx-menu' ></i>
    <form action="#">
        <div class=""  style="text-align: center;">
            <input style="text-align: center;" type="text" @disabled(true) value="Sell property dashboard">
            {{-- <button type="submit" class="search-btn"><i class='bx bx-search' ></i></button> --}}
        </div>
    </form>
    <input type="checkbox" id="switch-mode" hidden>
    <label for="switch-mode" class="switch-mode"></label>

    <a href="#" class="profile">
        <img src="{{asset('backend/img/people.png')}}">
    </a>
</nav>
<!-- NAVBAR -->
