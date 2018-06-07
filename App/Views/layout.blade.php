@include('header')

<div class="main-container">

    <!-- HEADER -->
    <header class="block">
        <ul class="header-menu horizontal-list">
            <li>
                <a class="header-menu-tab" href="{{ url('Admin/EditMe') }}"><span class="icon entypo-cog scnd-font-color"></span>Admin Panel</a>
            </li>
            <li>
                <a class="header-menu-tab" href="#2"><span class="icon fontawesome-user scnd-font-color"></span>About Me</a>
            </li>
            <li>
                <a class="header-menu-tab" href="#3"><span class="icon fontawesome-envelope scnd-font-color"></span>Contact Me</a>
                <a class="header-menu-number" href="#4">5</a>
            </li>
        </ul>
        <div class="profile-menu">
            <p>{{ me('name') }} {{ me('surname') }}</p>
            <div class="profile-picture small-profile-picture">
                <img width="40px" height="40px" alt="Anne Hathaway picture" src="{{ image(me('image')) }}">
            </div>
        </div>
    </header>

    <!-- LEFT-CONTAINER -->
    <div class="left-container layout-container ">
        <div class="menu-box block"> <!-- MENU BOX (LEFT-CONTAINER) -->
            <h2 class="titular">MENU BOX</h2>
            <ul class="menu-box-menu">
                <li>
                    <a class="menu-box-tab" href="#6"><span class="icon fontawesome-envelope scnd-font-color"></span>Messages<div class="menu-box-number">24</div></a>
                </li>
                <li>
                    <a class="menu-box-tab" href="#8"><span class="icon entypo-paper-plane scnd-font-color"></span>Invites<div class="menu-box-number">3</div></a>
                </li>
                <li>
                    <a class="menu-box-tab" href="#10"><span class="icon entypo-calendar scnd-font-color"></span>Events<div class="menu-box-number">5</div></a>
                </li>
                <li>
                    <a class="menu-box-tab" href="#12"><span class="icon entypo-cog scnd-font-color"></span>Account Settings</a>
                </li>
                <li>
                    <a class="menu-box-tab" href="#13"><sapn class="icon entypo-chart-line scnd-font-color"></sapn>Statistics</a>
                </li>
            </ul>
        </div>
       <div class="clear"></div>
    </div>

    <!-- MIDDLE-CONTAINER -->
    <div class="middle-container layout-container ">
        <div class="profile block"> <!-- PROFILE (MIDDLE-CONTAINER) -->
            <br>
            <div class="profile-picture big-profile-picture clear">
                <img width="100%" height="100%" alt="Anne Hathaway picture" src="{{ image(me('image')) }}" >
            </div>
            <h1 class="user-name">{{ me('name') }} {{ me('surname') }}</h1>
            <div class="profile-description">
                <p class="scnd-font-color">{{ me('job') }}</p>
            </div>
            <div class="profile-description text-left">
               {{ me('description') }}
            </div>
        </div>

        <ul class="social block"> <!-- SOCIAL (MIDDLE-CONTAINER) -->
            {{ facebookButton() }}
            {{ twitterButton() }}
            {{ githubButton() }}


        </ul>

    </div>

    <!-- RIGHT-CONTAINER -->
    <div class="right-container layout-container ">
        <div class="join-newsletter block"> <!-- JOIN NEWSLETTER (RIGHT-CONTAINER) -->
            <h2 class="titular">JOIN MY NEWSLETTER</h2>
            <form action="AddEmailNewsLetter" method="post" id="newLetterForm">
                <div class="input-container">
                    <input type="text" placeholder="yourname@gmail.com" class="email text-input news-letter" name="emailNewsLetter">
                    <span style="color:green" id="newsLettreResponse"></span>
                    <div class="input-icon envelope-icon-newsletter"><span class="fontawesome-envelope scnd-font-color"></span></div>
                </div>
                <a class="subscribe button" id="addNewsLetter" href="#21">SUBSCRIBE</a>
            </form>
        </div>

        <div class="tweets block"> <!-- TWEETS (MIDDLE-CONTAINER) -->
            <h2 class="titular"><span class="icon zocial-twitter"></span>LATEST TWEETS</h2>
            <div class="tweet first">
                <p>Ice-cream trucks only play music when out of ice-cream. Well played dad. On <a class="tweet-link" href="#17">@Quora</a></p>
                <p><a class="time-ago scnd-font-color" href="#18">3 minutes ago</a></p>
            </div>
            <div class="tweet">
                <p>We are in the process of pushing out all of the new CC apps! We will tweet again once they are live <a class="tweet-link" href="#19">#CreativeCloud</a></p>
                <p><a class="scnd-font-color" href="#20">6 hours ago</a></p>
            </div>
        </div>

    </div> <!-- end right-container -->
</div> <!-- end main-container -->

<div class="left-container social">

</div>

@include('footer')