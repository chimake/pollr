<div class="col-md-3 static">
    <div class="profile-card">
        <img src="<?php echo $thepicture; ?>" alt="user" class="profile-photo"/>
        <h5><a href="timeline.html" class="text-white"><?php echo $thefirstname . ' ' . $thelastname; ?></a></h5>
        <span class="hidden" id="userID"><?php echo $userID; ?></span>
        <a href="<?php echo $logoutURL; ?>" class="text-white"><i class="ion ion-log-out"></i> Logout</a>
    </div><!--profile card ends-->
    <ul class="nav-news-feed trending">

        <li>
            <div class="trendingHeader">Trending</div>
        </li>
        <li><i class="icon ion-ios-people"></i>
            <div><a href="newsfeed-people-nearby.html">People Nearby</a></div>
        </li>
        <li><i class="icon ion-ios-people-outline"></i>
            <div><a href="newsfeed-friends.html">Friends</a></div>
        </li>
        <li><i class="icon ion-chatboxes"></i>
            <div><a href="newsfeed-messages.html">Messages</a></div>
        </li>
        <li><i class="icon ion-images"></i>
            <div><a href="newsfeed-images.html">Images</a></div>
        </li>
        <li><i class="icon ion-ios-videocam"></i>
            <div><a href="newsfeed-videos.html">Videos</a></div>
        </li>
    </ul><!--news-feed links ends-->

    <ul class="nav-news-feed trending">

        <li>
            <form id="search-form" class="form-inline" role="form" method="post" action="//www.google.com/search" target="_blank">
                <div class="input-group">
                    <input type="text" class="form-control search-form" placeholder="Search">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary .btn-xs search-btn" data-target="#search-form" name="q"><i class="fa fa-search"></i></button>
                    </span>

                </div>
            </form>
        </li>
    </ul>

</div>