<?php
/**
 * Created by PhpStorm.
 * User: kukushkina
 * Date: 29.05.17
 * Time: 13:52
 */
?>

<div class="shoes_box">
    <div class="left_arrow arrow">
        <div class="square sq-left"></div>
    </div>
    <div class="right_arrow arrow">
        <div class="square sq-right"></div>
    </div>

    <div class="heart">
        <svg class="svg_heart" version="1.1" id="heart" xmlns="http://www.w3.org/2000/svg"
             xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             width="27px" height="24px" viewBox="0 0 27 24" enable-background="new 0 0 27 24" xml:space="preserve">
<path fill-rule="evenodd" clip-rule="evenodd" fill="#FF5164" d="M27,7.429C27,3.326,23.727,0,19.688,0
	c-2.61,0-4.894,1.393-6.188,3.483C12.206,1.393,9.922,0,7.313,0C3.273,0,0,3.326,0,7.429c0,1.475,0.599,3.108,1.125,4
	C4.5,17.143,13.5,24,13.5,24s9-6.857,12.375-12.571C26.401,10.537,27,8.904,27,7.429"/>
</svg>
    </div>
    <div class="shoe_window">
        <div class="shoes">
            <div class="shoe left_shoe">
            </div>
            <div class="shoe right_shoe">
            </div>
        </div>
    </div>

    <div class="buy_now">
        <svg class="svg_buy_now" version="1.1" id="buy_now" xmlns="http://www.w3.org/2000/svg"
             xmlns:xlink="http://www.w3.org/1999/xlink"
             x="0px" y="0px"
             width="105px" height="25px" viewBox="0 0 103.5 21" enable-background="new 0 0 103.5 21"
             xml:space="preserve">
<path fill-rule="evenodd" clip-rule="evenodd" fill="#0F0F14" d="M90.494,4.99L92.93,15h2.184l1.834-6.916L98.754,15h2.31
	L103.5,4.99h-2.1l-1.624,6.958L97.998,4.99h-1.932l-1.708,6.916L92.79,4.99H90.494z M83.656,15.154c1.568,0,2.856-0.546,3.752-1.456
	c0.896-0.91,1.414-2.198,1.414-3.696V9.89c0-1.512-0.546-2.758-1.442-3.654c-0.91-0.882-2.198-1.386-3.71-1.386
	c-1.498,0-2.772,0.532-3.682,1.428c-0.938,0.896-1.47,2.17-1.47,3.668v0.112c0,1.456,0.504,2.744,1.4,3.64
	C80.8,14.608,82.088,15.154,83.656,15.154z M83.698,13.348c-0.826,0-1.526-0.322-2.016-0.896c-0.504-0.56-0.798-1.386-0.798-2.408
	V9.932c0-1.008,0.252-1.834,0.742-2.408c0.49-0.56,1.162-0.882,2.044-0.882s1.568,0.336,2.058,0.91
	c0.462,0.574,0.728,1.4,0.728,2.366v0.112c0,1.008-0.28,1.848-0.742,2.408C85.224,13.012,84.538,13.348,83.698,13.348z M67.256,4.99
	V15h2.016V7.874L73.444,15h2.268V4.99h-2.016v6.594L69.888,4.99H67.256z M55.316,10.688V15h2.282v-4.312L60.72,4.99h-2.198
	l-1.988,3.836l-2.03-3.836h-2.492L55.316,10.688z M45.44,15.154c2.73,0,4.228-1.4,4.228-4.144V4.99h-2.282v5.88
	c0,1.834-0.588,2.478-1.932,2.478c-1.386,0-1.862-0.714-1.862-2.394V4.99H41.31v6.104C41.31,13.768,42.794,15.154,45.44,15.154z
	 M34.57,9.106h-1.358V6.544h1.344c1.064,0,1.54,0.378,1.54,1.218v0.056C36.096,8.714,35.676,9.106,34.57,9.106z M34.766,13.432
	h-1.554v-2.87h1.442c1.232,0,1.736,0.462,1.736,1.4v0.056C36.39,12.928,35.886,13.432,34.766,13.432z M31,4.99V15h4.116
	c2.338,0,3.514-0.952,3.514-2.8v-0.056c0-1.344-0.7-2.086-2.002-2.352c1.12-0.322,1.624-1.078,1.624-2.142V7.594
	c0-1.722-1.12-2.604-3.318-2.604H31z"/>
            <g>
                <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M8,17c-1.1,0-1.99,0.9-1.99,2S6.9,21,8,21s2-0.9,2-2S9.1,17,8,17"/>
                <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M18,17c-1.1,0-1.99,0.9-1.99,2s0.89,2,1.99,2s2-0.9,2-2S19.1,17,18,17"/>
                <polygon fill-rule="evenodd" clip-rule="evenodd" points="6.4,5 5,0 0,0 0,2 3.5,2 7,15 22,12 22,5 	"/>
            </g>
</svg>
    </div>
</div>

<style>


    .shoes_box {
        position: absolute;
        height: 222px;
        width: 222px;
        background-color: black;

        border-radius: 15px;
        -moz-border-radius: 15px;
        -webkit-border-radius: 15px;
    }

    .shoes_box:hover * {
        animation-name: none;
    }

    .shoe_window {
        position: absolute;
        height: 70.92px;
        width: 158px;
        top: 63.10px;
        right: 33px;
        bottom: 87.08px;
        left: 33px;
        overflow: hidden;
    }

    .left_shoe {
        background-color: red;
    }

    .right_shoe {
        left: 158px;
        background-color: blue;
    }

    .arrow {
        position: absolute;
        height: 24px;
        width: 24px;
        background: gray;
        margin-top: 22px;
        margin-bottom: 176px;
        border-radius: 50px;
        -moz-border-radius: 50px;
        -webkit-border-radius: 50px;

        -webkit-animation-timing-function: ease-in-out;
        -moz-animation-timing-function: ease-in-out;
        -o-animation-timing-function: ease-in-out;
        animation-timing-function: ease-in-out;
        -webkit-animation-name: transColor;
        -moz-animation-name: transColor;
        -o-animation-name: transColor;
        animation-name: transColor;
        -webkit-animation-duration: 4s;
        -moz-animation-duration: 4s;
        -o-animation-duration: 4s;
        animation-duration: 4s;
        -webkit-animation-iteration-count: infinite;
        -moz-animation-iteration-count: infinite;
        -o-animation-iteration-count: infinite;
        animation-iteration-count: infinite;

    }

    .arrow:active {

    .shoes {
        background-color: #a94442;
    }

    }

    .square {
        width: 8px;
        height: 8px;
        margin-top: 8px;
    }

    .left_arrow {
        left: 22px;
        right: 176px;
        -webkit-animation-delay: 1.5s;
        -moz-animation-delay: 1.5s;
        -o-animation-delay: 1.5s;
        animation-delay: 1.5s;

    }

    .sq-left {
        border-bottom: black solid 1px;
        border-left: solid black 1px;
        transform: rotate(45deg);
        margin-left: 10px
    }

    .sq-right {
        border-bottom: black solid 1px;
        border-left: solid black 1px;
        transform: rotate(-135deg);
        margin-left: 6px;
    }

    .right_arrow {
        left: 55px;
        right: 143px;

        -webkit-animation-delay: 3.5s;
        -moz-animation-delay: 3.5s;
        -o-animation-delay: 3.5s;
        animation-delay: 3.5s;

    }

    .buy_now {
        position: absolute;
        height: 40px;
        width: 176px;
        margin: 159px 23px 23px 23px;
        background: white;
        border-radius: 8px;
        -moz-border-radius: 8px;
        -webkit-border-radius: 8px;
    }

    .svg_buy_now {
        margin: 8px 33px;
    }

    .heart {
        position: absolute;
        margin: 22px 23px 176px 172px;
    }

    .svg_heart {
        -webkit-animation-timing-function: ease-in-out;
        -moz-animation-timing-function: ease-in-out;
        -o-animation-timing-function: ease-in-out;
        animation-timing-function: ease-in-out;
        -webkit-animation-name: heartBeat;
        -moz-animation-name: heartBeat;
        -o-animation-name: heartBeat;
        animation-name: heartBeat;
        -webkit-animation-duration: 4s;
        -moz-animation-duration: 4s;
        -o-animation-duration: 4s;
        animation-duration: 4s;
        -webkit-animation-iteration-count: infinite;
        -moz-animation-iteration-count: infinite;
        -o-animation-iteration-count: infinite;
        animation-iteration-count: infinite;
        -webkit-animation-delay: 3s;
        -moz-animation-delay: 3s;
        -o-animation-delay: 3s;
        animation-delay: 3s;
    }

    @keyframes heartBeat {
        0% {
            transform: scale(1.0)
        }
        5% {
            transform: scale(1.7);
        }
        10% {
            transform: scale(1.0);
        }
        100% {
            transform: scale(1.0);
        }
    }

    @keyframes transColor {
        0% {
            background: grey;
        }
        5% {
            background: white;
        }
        10% {
            background: grey;
        }
        100% {
            background: grey;
        }
    }

    @keyframes translateShoe {
        0% {
            transform: translateX(0);
        }
        7%,
        50% {
            transform: translateX(-50%);
        }
        57%,
        100% {
            transform: translateX(0);
        }
    }

    .shoe {
        height: inherit;
        width: 158px;
        position: absolute;
    }

    .shoes {
        height: inherit;
        width: 316px;

        -webkit-animation-timing-function: ease-in-out;
        -moz-animation-timing-function: ease-in-out;
        -o-animation-timing-function: ease-in-out;
        animation-timing-function: ease-in-out;
        -webkit-animation-name: translateShoe;
        -moz-animation-name: translateShoe;
        -o-animation-name: translateShoe;
        animation-name: translateShoe;
        -webkit-animation-duration: 4s;
        -moz-animation-duration: 4s;
        -o-animation-duration: 4s;
        animation-duration: 4s;
        -webkit-animation-iteration-count: infinite;
        -moz-animation-iteration-count: infinite;
        -o-animation-iteration-count: infinite;
        animation-iteration-count: infinite;
        -webkit-animation-delay: 2s;
        -moz-animation-delay: 2s;
        -o-animation-delay: 2s;
        animation-delay: 2s;
    }

</style>


<div class="social_wid">
    <a href="https://www.facebook.com/breadhead.ru/" target="_blank">
        <div class="social_div facebook_div">
            <svg class="social_svg facebook_svg" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                 xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 width="8px" height="16px" viewBox="0 0 8 16" enable-background="new 0 0 8 16" xml:space="preserve">
<path fill-rule="evenodd" clip-rule="evenodd" fill="#1C1C24" d="M5.193,16V8.702h2.359l0.353-2.844H5.193V4.041
	c0-0.823,0.22-1.385,1.357-1.385L8,2.656V0.112C7.749,0.077,6.888,0,5.887,0C3.796,0,2.365,1.325,2.365,3.76v2.098H0v2.844h2.365V16
	H5.193z"/>
</svg>
        </div>
    </a>

    <div class="line top-line">
    </div>
    <a href="https://www.behance.net/addenny" target="_blank">
        <div class="social_div behance_div">
            <svg class="social_svg behance_svg" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                 xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 width="18px" height="11px" viewBox="0 0 18 11" enable-background="new 0 0 18 11" xml:space="preserve">
<path fill-rule="evenodd" clip-rule="evenodd" fill="#1C1C24" d="M15.591,5.938c-0.039-0.548-0.222-0.962-0.552-1.245
	c-0.328-0.284-0.737-0.427-1.225-0.427c-0.531,0-0.942,0.152-1.233,0.452c-0.294,0.299-0.476,0.705-0.551,1.22L15.591,5.938
	L15.591,5.938z M17.668,5.733c0.054,0.36,0.078,0.882,0.068,1.565H11.98c0.032,0.792,0.306,1.346,0.826,1.663
	c0.314,0.199,0.694,0.296,1.139,0.296c0.47,0,0.852-0.118,1.147-0.362c0.161-0.129,0.302-0.311,0.425-0.541h2.11
	c-0.055,0.468-0.309,0.942-0.766,1.424c-0.707,0.766-1.699,1.15-2.973,1.15c-1.052,0-1.98-0.324-2.785-0.97
	C10.301,9.311,9.898,8.26,9.898,6.802c0-1.367,0.362-2.413,1.088-3.141c0.729-0.73,1.669-1.093,2.828-1.093
	c0.687,0,1.306,0.122,1.859,0.368c0.551,0.246,1.006,0.634,1.365,1.167C17.362,4.573,17.571,5.115,17.668,5.733z M6.72,7.523
	c0-0.571-0.234-0.966-0.702-1.178c-0.262-0.12-0.631-0.182-1.104-0.186H2.545v2.931h2.332c0.479,0,0.85-0.063,1.118-0.193
	C6.478,8.657,6.72,8.2,6.72,7.523z M2.545,4.337h2.336c0.48,0,0.868-0.091,1.167-0.273C6.346,3.883,6.495,3.56,6.495,3.097
	c0-0.512-0.197-0.851-0.593-1.015C5.563,1.969,5.128,1.91,4.6,1.91H2.545V4.337z M8.616,6.069c0.287,0.443,0.43,0.98,0.43,1.611
	c0,0.653-0.162,1.238-0.49,1.755c-0.209,0.342-0.469,0.631-0.781,0.864c-0.351,0.269-0.767,0.454-1.246,0.552
	C6.049,10.95,5.53,11,4.971,11H0V0h5.33c1.344,0.022,2.296,0.41,2.859,1.172C8.526,1.639,8.694,2.2,8.694,2.851
	c0,0.673-0.169,1.211-0.51,1.619c-0.19,0.229-0.47,0.438-0.84,0.626C7.905,5.302,8.331,5.624,8.616,6.069z M16.019,1.1h-4.445V0
	h4.445L16.019,1.1L16.019,1.1z"/>
</svg>
        </div>
    </a>
    <div class="line bottom-line"></div>
    <a href="https://medium.com/breadhead-stories" target="_blank">
        <div class="social_div medium_div">
            <svg class="social_svg medium_svg" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                 xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 width="16px" height="13px" viewBox="0 0 16 13" enable-background="new 0 0 16 13" xml:space="preserve">
<path fill-rule="evenodd" clip-rule="evenodd" fill="#1C1C24" d="M15.669,2.371l-0.005-0.003l-4.446-2.317
	c-0.031-0.016-0.064-0.027-0.097-0.034C11.078,0.006,11.036,0,10.993,0c-0.178,0-0.355,0.089-0.451,0.244L7.9,4.579l3.208,5.171
	l4.584-7.298c0.015-0.025,0.009-0.056-0.013-0.073C15.674,2.376,15.672,2.373,15.669,2.371z"/>
                <polygon fill-rule="evenodd" clip-rule="evenodd" fill="#1C1C24" points="6,8.55 10.55,10.75 6,3.6 "/>
                <path fill-rule="evenodd" clip-rule="evenodd" fill="#1C1C24" d="M15.133,12.894C15.611,13.127,16,12.963,16,12.529V3.9l-4.55,7.2
	L15.133,12.894z"/>
                <path fill-rule="evenodd" clip-rule="evenodd" fill="#1C1C24" d="M0.554,0.061C0.474,0.02,0.398,0,0.329,0
	C0.136,0.001,0,0.155,0,0.413v9.817c0,0.263,0.187,0.574,0.416,0.692l3.892,2.003C4.408,12.976,4.503,13,4.588,13
	C4.831,13,5,12.807,5,12.484V2.379c0-0.02-0.011-0.037-0.027-0.045L0.554,0.061z"/>
</svg>
        </div>
    </a>
</div>

<style>
    .social_wid {
        position: absolute;
        top: 400px;
        width: 110px;
        height: 110px;
        background: rgba(88, 88, 104, 1);
        border-radius: 15px;
        -moz-border-radius: 15px;
        -webkit-border-radius: 15px;
    }

    .social_div {
        position: absolute;
        border-radius: 50px;
        -moz-border-radius: 50px;
        -webkit-border-radius: 50px;
        width: 32px;
        height: 32px;
        background: white;
        z-index: 9;
    }

    .social_div:hover {
        animation-name: scaleIcon;
        -webkit-animation-name: scaleIcon;
        animation-duration: 4s;
    }

    .facebook_div {
        top: 15px;
        right: 58px;
        bottom: 63px;
        left: 20px;
    }

    .medium_div {
        top: 39px;
        right: 16px;
        bottom: 39px;
        left: 62px;
    }

    .behance_div {
        top: 63px;
        right: 58px;
        bottom: 16px;
        left: 20px;
    }

    .social_svg.facebook_svg {
        margin: 8px 12px;
    }

    .social_svg.medium_svg {
        margin: 10px 8.18px 10.8px 8px;
    }

    .social_svg.behance_svg {
        margin: 11px 7.26px 10.01px 7px;
    }

    .social_svg {
        position: absolute;
        z-index: 10;
    }

    .line {
        position: absolute;
        border-top: solid 2px white;
        width: 42px;
        height: 42px;
        z-index: 0;
    }

    .top-line {
        top: 40px;
        right: 40px;
        transform: rotate(30deg);
    }

    .bottom-line {
        top: 66px;
        right: 22px;
        bottom: 31px;
        left: 46px;
        transform: rotate(-30deg);
    }

    @keyframes scaleIcon {
        0% {
            transform: scale(1.0);
        }
        20% {
            transform: scale(1.3);
        }
        100% {
            transform: scale(1.3);
        }
    }
</style>