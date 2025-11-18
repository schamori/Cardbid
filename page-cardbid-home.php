<?php
/*
Template Name: Cardbid Home Page
Description: Custom landing page for Cardbid with gradient background
*/

// Enqueue the stylesheet
wp_enqueue_style('cardbid-home-css', get_stylesheet_directory_uri() . '/cardbid-style.css', array(), '1.0');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <div class="app">
    <div class="hero-background"></div>
    <div class="content-wrapper">

      <!-- Navigation -->
      <nav class="navigation">
        <div class="nav-logo">
          <div class="logo-icon">
            <svg viewBox="0 0 74 58" fill="none">
              <path d="M67.5096 34.0127C65.6908 30.992 62.7747 28.9468 59.5472 27.5559C59.2883 27.4444 58.0789 27.0224 58.0039 26.8476C57.9742 26.7728 57.9833 26.4599 57.9897 26.2428C58.1505 20.7784 58.3419 15.3308 58.5436 9.87046C58.5436 7.93362 58.7656 5.55918 57.379 4.18635C56.4841 3.44274 55.6166 3.09566 54.4746 3.11779C52.3343 3.15929 50.0657 3.45373 47.917 3.57564C42.1417 3.90319 33.173 4.22612 27.4011 4.58693C24.5716 4.74659 23.0673 5.50351 22.5964 8.41432C21.747 13.6574 21.5515 19.5451 21.2731 24.859C21.2386 25.5173 21.2076 26.2165 21.186 26.872C17.7607 27.5876 13.4653 25.5582 11.4377 22.5885C11.9296 20.2589 11.884 18.2214 9.18876 17.3145L10.7778 13.6163C10.7823 13.6059 10.7949 13.6011 10.8054 13.6054C12.345 14.2316 11.7786 14.2412 12.2425 14.8791C12.5473 15.2984 13.2176 15.7248 13.7433 15.7962C17.4731 16.3021 20.4186 10.8836 20.2473 7.75604C20.1434 5.85868 18.8797 4.66908 16.9143 4.85896C16.544 4.89468 16.0515 5.12302 16.0515 5.12302C15.2814 4.87429 10.5984 2.91721 9.49082 2.40961C9.39573 1.75291 9.19007 0.744506 7.76042 0.195691C3.44297 -1.28994 -0.125471 6.07503 1.27935 9.46004C1.67182 10.4052 2.67381 11.0721 3.71771 11.1169C4.1597 11.1358 4.61293 10.9082 4.97998 10.9682C5.32688 11.0248 6.22735 11.4925 6.6261 11.6596C6.80547 11.7422 6.77494 11.71 6.74952 11.7963L4.96523 15.792C2.60224 15.6533 1.18587 17.4583 0.65786 19.516C0.278975 20.9925 0.263639 22.2883 1.21494 23.5574C0.85446 24.5039 0.0930383 25.5909 0.0112436 26.6036C-0.263499 30.0115 4.47432 30.1014 4.88519 27.0207C5.32965 27.3222 6.16308 27.8302 7.22101 27.5675C7.49649 27.7942 8.99245 28.9746 9.56005 29.3455C13.0331 31.6151 16.8158 32.7733 20.9925 32.0769C20.8731 34.0512 20.605 40.1556 20.5741 42.139C20.521 45.5676 21.3934 47.1631 24.5999 47.4292C24.8719 47.4599 25.1875 47.4503 25.4233 47.4503C25.5248 47.4581 25.5829 47.4365 25.5829 47.5683C25.5449 47.8204 25.2223 48.4112 25.1211 48.7711C24.9668 49.3198 24.817 49.8926 24.8321 50.4643C23.2138 49.9412 21.7761 48.9844 19.9814 49.5173C18.016 50.101 17.5149 52.1573 18.8001 53.6744C20.0482 55.1476 25.7782 57.8464 27.6647 57.6114C29.6076 57.3694 29.252 55.3511 29.4224 54.0049C29.6978 51.8287 30.0656 49.5726 31.1999 47.6593L45.1877 48.0699C45.7187 49.7156 46.4159 51.5312 48.0584 52.3966C47.4589 52.8326 46.8412 53.0902 46.3247 53.6812C44.9487 55.2558 45.0651 57.6078 47.4966 57.9115C48.6683 58.0579 50.9567 57.9993 51.3363 57.9118C52.0273 57.7689 52.5874 57.6613 53.2108 57.3157C55.4424 56.0787 56.9427 51.3901 54.0506 50.1447C53.5409 49.9251 53.2015 49.985 52.735 49.8731C52.1158 49.7244 51.078 49.0627 50.8879 48.448C50.8744 48.3468 51.0009 48.3503 51.0082 48.3503H53.6029C56.0463 48.3503 57.4268 46.366 57.4268 44.4462L57.7053 32.5372C58.7501 32.9738 59.762 33.4928 60.6518 34.1946C61.0326 34.4948 62.4309 35.825 62.5397 36.2124C62.6032 36.438 61.7546 37.2816 61.5615 37.5649C61.2453 38.0287 60.9231 38.648 60.7804 39.1883C59.9209 42.4404 63.041 44.3135 65.2433 41.6406C66.4146 42.8589 68.0017 44.8301 69.9402 44.4104C70.8423 44.215 71.5787 43.4919 71.9185 42.6754C72.0185 42.4351 72.0488 41.9976 72.1782 41.827C72.2985 41.6682 72.757 41.5483 72.9637 41.4031C73.6442 41.0246 74 40.329 74 39.7082V39.3956C74 36.247 70.1983 34.6393 67.5096 34.0131V34.0127Z" fill="white"/>
              <path d="M53.2953 8.11335C52.9517 7.76122 52.3996 7.6111 51.6544 7.66548C48.3419 7.91031 29.0126 8.92493 28.8177 8.9352L28.7913 8.9365L28.7649 8.93607C28.5861 8.93737 26.9363 9.02082 26.7815 11.5005L26.7811 11.507C26.7653 11.727 25.2113 33.5792 25.2113 40.598L25.2106 40.632C25.2106 40.632 25.1972 41.3451 25.6779 41.8339C26.0226 42.1844 26.5663 42.3622 27.2937 42.3622C31.6129 42.3622 51.3875 42.9386 51.5884 42.9444C51.7759 42.9574 52.559 42.9236 52.8977 42.6112C53.1233 42.4031 53.233 42.0851 53.233 41.6389C53.233 38.4937 53.7843 10.2555 53.7898 9.97079L53.7949 9.89689C53.7958 9.88894 53.914 8.74764 53.2953 8.11335ZM29.7093 16.2062C29.3474 15.9878 29.2352 15.5161 29.4556 15.1577C29.5212 15.0511 30.1396 14.0993 31.6553 13.4894C32.3675 13.2029 33.8787 12.97 35.0084 13.3484C35.41 13.4831 35.6253 13.9143 35.4893 14.3119C35.3534 14.7094 34.9179 14.9221 34.5164 14.7879C33.8467 14.5635 32.7167 14.7026 32.2331 14.8974C31.1879 15.3179 30.7783 15.9308 30.7614 15.9567C30.6175 16.1906 30.3678 16.3182 30.1108 16.3182C29.974 16.3182 29.8352 16.282 29.7093 16.2062ZM33.6552 27.5712C32.0688 27.3887 30.7988 25.7939 30.3803 23.7058C30.517 23.7402 30.6593 23.7623 30.8068 23.7672C31.8472 23.8024 32.7176 23.0484 32.7509 22.0832C32.7841 21.118 31.9676 20.3072 30.9272 20.272C30.7687 20.2667 30.615 20.2816 30.4668 20.3108C31.0361 18.082 32.5742 16.5745 34.2849 16.7713C36.3417 17.0081 37.868 19.6175 37.6941 22.5998C37.5203 25.582 35.7119 27.8076 33.6552 27.5709V27.5712ZM42.7995 32.1963C42.638 32.2857 41.1828 33.0688 39.8625 33.0793C39.8088 33.0797 39.7496 33.0828 39.684 33.086C39.5685 33.0913 39.434 33.0978 39.2786 33.0978C38.6061 33.0978 37.5362 32.9788 35.86 32.1545C35.4804 31.9678 35.3255 31.5117 35.5141 31.1358C35.7027 30.7601 36.1632 30.6065 36.5428 30.7934C38.249 31.6324 39.1012 31.5915 39.6104 31.5679C39.6986 31.5637 39.7781 31.5601 39.8501 31.5595C40.6362 31.5532 41.7064 31.0587 42.0524 30.8686C42.4226 30.6654 42.89 30.797 43.0958 31.1634C43.3017 31.5298 43.1692 31.9918 42.7994 32.1961L42.7995 32.1963ZM49.3024 22.9434C49.1286 25.9256 47.3202 28.1513 45.2635 27.9145C43.7567 27.7411 42.5356 26.2937 42.0581 24.3597C42.2613 24.4482 42.4826 24.5064 42.7179 24.523C43.7827 24.5982 44.7052 23.8338 44.7785 22.8155C44.8519 21.7973 44.0482 20.9109 42.9834 20.8357C42.6273 20.8106 42.2883 20.881 41.9905 21.0219C42.4776 18.5932 44.0897 16.9074 45.8931 17.1151C47.9498 17.3518 49.4763 19.9611 49.3024 22.9434ZM50.158 17.2436C50.0714 17.2749 49.9826 17.2898 49.8955 17.2898C49.5849 17.2898 49.293 17.1016 49.1773 16.7978C49.1597 16.7543 48.8753 16.0825 47.9449 15.4743C47.5092 15.1895 46.4285 14.833 45.7278 14.9231C45.3076 14.9762 44.9225 14.6834 44.8681 14.2672C44.8136 13.8511 45.1102 13.4699 45.5308 13.4161C46.7131 13.2646 48.1491 13.7869 48.7906 14.2061C50.156 15.0987 50.5735 16.1524 50.6166 16.2697C50.7617 16.664 50.5565 17.1 50.1581 17.2436H50.158Z" fill="white"/>
            </svg>
          </div>
          <div class="logo-text">
            <svg viewBox="0 0 170 47" fill="none">
              <path d="M12.938 46.614C10.378 46.614 8.263 46.304 6.591 45.685C4.92 45.065 3.596 44.206 2.617 43.105C1.638 42.004 0.958 40.696 0.575 39.18C0.191 37.664 0 36.001 0 34.191V22.892C0 20.593 0.196 18.584 0.587 16.864C0.979 15.144 1.663 13.713 2.642 12.572C3.621 11.431 4.932 10.575 6.58 10.004C8.226 9.434 10.297 9.148 12.792 9.148C14.504 9.148 16.098 9.352 17.573 9.76C19.048 10.168 20.328 10.767 21.413 11.557C22.497 12.348 23.345 13.322 23.956 14.479C24.567 15.637 24.873 16.966 24.873 18.465V24.066H16.362V18.93C16.362 18.506 16.309 18.111 16.203 17.744C16.098 17.377 15.906 17.059 15.629 16.79C15.352 16.521 14.96 16.31 14.455 16.154C13.949 15.999 13.289 15.922 12.474 15.922H4.158V16.314L8.364 18.906V36.759C8.364 37.134 8.441 37.501 8.596 37.86C8.75 38.219 8.992 38.541 9.318 38.826C9.643 39.111 10.064 39.34 10.577 39.511C11.091 39.682 11.706 39.768 12.424 39.768C13.158 39.768 13.781 39.686 14.295 39.523C14.809 39.36 15.22 39.136 15.53 38.851C15.84 38.566 16.063 38.24 16.202 37.872C16.341 37.505 16.41 37.118 16.41 36.71V30.547H24.872V36.955C24.872 38.471 24.575 39.829 23.979 41.027C23.384 42.225 22.556 43.236 21.497 44.059C20.437 44.883 19.178 45.514 17.719 45.955C16.26 46.396 14.666 46.615 12.938 46.615V46.614Z" fill="white"/>
              <path d="M36.488 46.614C35.38 46.614 34.414 46.447 33.591 46.113C32.768 45.779 32.054 45.318 31.451 44.731C30.847 44.144 30.35 43.447 29.959 42.64C29.568 41.833 29.258 40.961 29.029 40.023C28.8 39.085 28.641 38.103 28.552 37.076C28.462 36.049 28.417 35.014 28.417 33.97C28.417 32.258 28.657 30.697 29.139 29.287C29.619 27.877 30.321 26.67 31.243 25.667C32.164 24.664 33.289 23.89 34.618 23.344C35.946 22.798 37.45 22.525 39.13 22.525H44.584V18.758C44.584 16.786 43.304 15.799 40.744 15.799C40.14 15.799 39.61 15.881 39.154 16.044C38.698 16.207 38.318 16.423 38.017 16.692C37.715 16.961 37.491 17.275 37.344 17.633C37.198 17.992 37.124 18.367 37.124 18.758V20.397H29.102V19.688C29.102 18.09 29.286 16.643 29.653 15.347C30.02 14.051 30.668 12.947 31.597 12.034C32.526 11.121 33.778 10.411 35.351 9.906C36.924 9.401 38.917 9.148 41.33 9.148C42.976 9.148 44.51 9.344 45.928 9.735C47.347 10.127 48.577 10.705 49.621 11.472C50.664 12.239 51.483 13.188 52.079 14.321C52.674 15.454 52.972 16.771 52.972 18.271V46.225H44.73V39.768H44.07C43.564 42.002 42.66 43.702 41.355 44.867C40.05 46.033 38.428 46.616 36.488 46.616V46.614ZM40.817 39.326C41.535 39.326 42.133 39.24 42.615 39.069C43.095 38.898 43.479 38.677 43.764 38.408C44.049 38.139 44.253 37.833 44.375 37.491C44.497 37.149 44.559 36.806 44.559 36.464V31.891L49.083 29.69V29.201H40.645C40.171 29.201 39.711 29.295 39.263 29.482C38.815 29.669 38.419 29.93 38.076 30.264C37.734 30.598 37.457 31.002 37.245 31.475C37.033 31.948 36.927 32.477 36.927 33.064V36.072C36.927 38.24 38.224 39.325 40.816 39.325L40.817 39.326Z" fill="white"/>
              <path d="M56.519 46.223V15.945C56.519 15.065 56.658 14.237 56.935 13.463C57.212 12.689 57.62 12.008 58.158 11.421C58.696 10.834 59.352 10.374 60.127 10.04C60.902 9.706 61.786 9.539 62.78 9.539H73.003V17.291H60.09V17.584L65.006 20.103V46.223H56.519Z" fill="white"/>
              <path d="M85.671 46.614C84.334 46.614 83.104 46.357 81.979 45.844C80.854 45.33 79.888 44.63 79.081 43.74C78.274 42.852 77.646 41.8 77.198 40.585C76.749 39.371 76.525 38.062 76.525 36.66V18.611C76.525 18.024 76.557 17.384 76.623 16.691C76.688 15.998 76.823 15.301 77.027 14.6C77.23 13.899 77.511 13.222 77.871 12.57C78.229 11.918 78.706 11.339 79.302 10.833C79.897 10.328 80.618 9.92 81.466 9.61C82.314 9.3 83.324 9.145 84.498 9.145L92.862 9.121V3.179H101.348V46.222H92.862V40.744H92.569C92.275 41.853 91.876 42.782 91.37 43.532C90.865 44.282 90.303 44.886 89.682 45.342C89.063 45.799 88.411 46.125 87.726 46.32C87.041 46.516 86.357 46.614 85.671 46.614ZM88.899 39.791C90.986 39.791 92.16 39.327 92.42 38.397C92.551 37.908 92.656 37.382 92.738 36.82C92.819 36.258 92.86 35.667 92.86 35.047V18.784L97.776 16.363V15.947L88.849 15.972C87.822 15.972 87.039 16.094 86.501 16.339C85.963 16.584 85.584 16.922 85.363 17.354C85.143 17.787 85.025 18.288 85.009 18.858C84.993 19.428 84.985 20.048 84.985 20.716V35.048C84.985 35.684 85.017 36.283 85.083 36.846C85.149 37.409 85.246 37.934 85.377 38.423C85.654 39.337 86.828 39.793 88.898 39.793L88.899 39.791Z" fill="white"/>
              <path d="M121.5 46.223C120.814 46.223 120.081 46.097 119.299 45.844C118.516 45.591 117.762 45.217 117.036 44.719C116.31 44.221 115.667 43.598 115.104 42.848C114.542 42.098 114.138 41.234 113.893 40.256H113.355V46.223H104.869V3.179H113.355V9.122L121.719 9.146C122.893 9.146 123.904 9.301 124.751 9.611C125.599 9.921 126.32 10.329 126.916 10.834C127.511 11.34 127.987 11.918 128.347 12.571C128.705 13.223 128.987 13.9 129.191 14.601C129.394 15.302 129.529 15.999 129.594 16.692C129.659 17.385 129.692 18.025 129.692 18.612V36.661C129.692 38.063 129.517 39.351 129.167 40.525C128.817 41.699 128.294 42.706 127.602 43.545C126.909 44.385 126.053 45.041 125.034 45.514C124.015 45.987 122.836 46.223 121.5 46.223ZM117.317 39.791C118.035 39.791 118.638 39.669 119.127 39.424C119.616 39.179 120.021 38.841 120.338 38.409C120.656 37.977 120.884 37.472 121.023 36.893C121.162 36.314 121.231 35.699 121.231 35.046V20.714C121.231 20.046 121.223 19.426 121.207 18.856C121.191 18.286 121.072 17.784 120.853 17.352C120.633 16.92 120.253 16.582 119.715 16.337C119.178 16.092 118.395 15.97 117.367 15.97L108.44 15.945V16.361L113.356 18.782V35.045C113.356 35.697 113.433 36.313 113.588 36.892C113.743 37.471 113.98 37.976 114.297 38.408C114.615 38.84 115.023 39.179 115.521 39.423C116.018 39.668 116.617 39.79 117.318 39.79L117.317 39.791Z" fill="white"/>
              <path d="M133.239 7.288V0H141.53V7.288H133.239ZM133.239 46.223V9.538H141.53V46.223H133.239Z" fill="white"/>
              <path d="M154.223 46.614C152.886 46.614 151.656 46.357 150.531 45.844C149.406 45.33 148.44 44.63 147.633 43.74C146.826 42.852 146.198 41.8 145.75 40.585C145.301 39.371 145.077 38.062 145.077 36.66V18.611C145.077 18.024 145.109 17.384 145.175 16.691C145.24 15.998 145.375 15.301 145.579 14.6C145.782 13.899 146.063 13.222 146.423 12.57C146.781 11.918 147.258 11.339 147.854 10.833C148.449 10.328 149.17 9.92 150.018 9.61C150.866 9.3 151.876 9.145 153.05 9.145L161.414 9.121V3.179H169.9V46.222H161.414V40.744H161.121C160.827 41.853 160.428 42.782 159.922 43.532C159.417 44.282 158.855 44.886 158.234 45.342C157.615 45.799 156.963 46.125 156.278 46.32C155.593 46.516 154.909 46.614 154.223 46.614ZM157.451 39.791C159.538 39.791 160.712 39.327 160.972 38.397C161.103 37.908 161.208 37.382 161.29 36.82C161.371 36.258 161.412 35.667 161.412 35.047V18.784L166.328 16.363V15.947L157.401 15.972C156.374 15.972 155.591 16.094 155.053 16.339C154.515 16.584 154.136 16.922 153.915 17.354C153.695 17.787 153.577 18.288 153.561 18.858C153.545 19.428 153.537 20.048 153.537 20.716V35.048C153.537 35.684 153.569 36.283 153.635 36.846C153.701 37.409 153.798 37.934 153.929 38.423C154.206 39.337 155.38 39.793 157.45 39.793L157.451 39.791Z" fill="white"/>
            </svg>
          </div>
        </div>

        <div class="nav-menu">
          <button class="nav-link nav-shop">
            Shop
            <svg class="dropdown-icon" viewBox="0 0 10 6" fill="none">
              <path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </button>
          <button class="nav-link">Dashboard</button>
          <button class="nav-link">Account</button>

          <div class="nav-cart">
            <span class="cart-items">0 Items</span>
            <span class="cart-price">0,00€</span>
            <div class="cart-icon">
              <svg viewBox="0 0 24 24" fill="none">
                <path d="M9 11V6C9 4.34315 10.3431 3 12 3C13.6569 3 15 4.34315 15 6V11M12 14H12.01M3.6 21H20.4C20.9601 21 21.2401 21 21.454 20.891C21.6422 20.7951 21.7951 20.6422 21.891 20.454C22 20.2401 22 19.9601 22 19.4V11.6C22 11.0399 22 10.7599 21.891 10.546C21.7951 10.3578 21.6422 10.2049 21.454 10.109C21.2401 10 20.9601 10 20.4 10H3.6C3.03995 10 2.75992 10 2.54601 10.109C2.35785 10.2049 2.20487 10.3578 2.10899 10.546C2 10.7599 2 11.0399 2 11.6V19.4C2 19.9601 2 20.2401 2.10899 20.454C2.20487 20.6422 2.35785 20.7951 2.54601 20.891C2.75992 21 3.03995 21 3.6 21Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
          </div>
        </div>

        <!-- Mega Menu (content omitted for brevity - include full menu from HTML) -->
      </nav>

      <!-- Hero Section -->
      <section class="hero">
        <div class="hero-content">
          <div class="hero-text">
            <h1 class="hero-title">
              Seltene Pokémon<br>
              Karten online kaufen<br>
              oder versteigern
            </h1>
            <p class="hero-description">
              Kaufe, verkaufe oder versteigere deine Pokémon Karten bequem online –
              mit transparentem Grading und fairen Preisen.
            </p>
            <div class="hero-buttons">
              <button class="hero-button primary">Zum Marktplatz</button>
              <button class="hero-button secondary">Mehr erfahren</button>
            </div>
          </div>
        </div>

        <div class="hero-cards">
          <div class="hero-card hero-card-1">
            <img src="https://cardbid.eu/wp-content/uploads/2025/08/166_hires-33.png" alt="Pokemon Card" class="card-image">
          </div>
          <div class="hero-card hero-card-2">
            <img src="https://cardbid.eu/wp-content/uploads/2025/08/166_hires-33.png" alt="Pokemon Card" class="card-image">
          </div>
          <div class="hero-card hero-card-3">
            <img src="https://cardbid.eu/wp-content/uploads/2025/08/166_hires-33.png" alt="Pokemon Card" class="card-image">
          </div>
          <div class="hero-card hero-card-4">
            <img src="https://cardbid.eu/wp-content/uploads/2025/08/166_hires-33.png" alt="Pokemon Card" class="card-image">
          </div>
          <div class="hero-card hero-card-5">
            <img src="https://cardbid.eu/wp-content/uploads/2025/08/166_hires-33.png" alt="Pokemon Card" class="card-image">
          </div>
          <div class="hero-card hero-card-main">
            <img src="https://cardbid.eu/wp-content/uploads/2025/10/Charakter_Beide_mit_Schatten.png" alt="Characters" class="card-image main">
          </div>
        </div>
      </section>

      <div class="lower-background"></div>

      <!-- Features Section -->
      <section class="features">
        <div class="features-container">
          <h2 class="features-title">Was ist Cardbid?</h2>
          <div class="features-grid">
            <div class="feature-card">
              <h3 class="feature-title">TCG Sammelkarten Marktplatz</h3>
              <p class="feature-description">Erweitere deine Sammlung mit exklusiven Sammelkarten. Finde seltene Karten, nutze KI-Grading und entdecke die besten Deals.</p>
            </div>
            <div class="feature-card">
              <h3 class="feature-title">KI-basierte Grading-Schätzung</h3>
              <p class="feature-description">Erhalten Sie eine präzise Bewertung des Kartenzustands mit AI-Technologie für alle Kartentypen. Professionell und zuverlässig.</p>
            </div>
            <div class="feature-card">
              <h3 class="feature-title">Auktions-Features & Chatbot</h3>
              <p class="feature-description">Bieten Sie in Echtzeit, sehen Sie laufende Auktionen und nutzen Sie unseren Chatbot für Expertenwissen über TCG-Karten.</p>
            </div>
          </div>
        </div>
      </section>

      <!-- Gallery Section - Höchste Gebote (Simple Auction Integration) -->
      <section class="gallery">
        <div class="gallery-container">
          <div class="gallery-header">
            <h2 class="gallery-title">Höchste Gebote</h2>
            <button class="view-all-button">Alle ansehen</button>
          </div>

          <div class="carousel-wrapper">
            <button class="carousel-nav prev" aria-label="Previous">
              <svg viewBox="0 0 24 24" fill="none">
                <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </button>

            <div class="carousel-container">
              <div class="carousel-track">
                <?php
                // Get all WooCommerce products using wc_get_products (recommended method)
                $products = wc_get_products(array(
                    'limit' => -1, // Get all products
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'status' => 'publish'
                ));

                // Display products or fallback
                if (!empty($products)) :
                    $count = 0;
                    foreach ($products as $product) :
                        $active_class = ($count === 2) ? ' active' : '';
                        $product_id = $product->get_id();
                        $product_url = get_permalink($product_id);
                        $product_title = $product->get_name();
                        $product_image = wp_get_attachment_image_url($product->get_image_id(), 'large');
                        if (!$product_image) {
                            $product_image = 'https://cardbid.eu/wp-content/uploads/2025/08/166_hires-33.png';
                        }
                        ?>
                        <div class="carousel-card<?php echo $active_class; ?>" data-product-id="<?php echo $product_id; ?>">
                          <a href="<?php echo esc_url($product_url); ?>">
                            <img src="<?php echo esc_url($product_image); ?>" alt="<?php echo esc_attr($product_title); ?>" class="card-image">
                          </a>
                        </div>
                        <?php
                        $count++;
                    endforeach;
                else : ?>
                  <!-- Fallback cards if no auctions found -->
                  <div class="carousel-card">
                    <img src="https://cardbid.eu/wp-content/uploads/2025/08/166_hires-33.png" alt="Pokemon Card" class="card-image">
                  </div>
                  <div class="carousel-card">
                    <img src="https://cardbid.eu/wp-content/uploads/2025/08/166_hires-33.png" alt="Pokemon Card" class="card-image">
                  </div>
                  <div class="carousel-card active">
                    <img src="https://cardbid.eu/wp-content/uploads/2025/08/166_hires-33.png" alt="Pokemon Card" class="card-image">
                  </div>
                  <div class="carousel-card">
                    <img src="https://cardbid.eu/wp-content/uploads/2025/08/166_hires-33.png" alt="Pokemon Card" class="card-image">
                  </div>
                  <div class="carousel-card">
                    <img src="https://cardbid.eu/wp-content/uploads/2025/08/166_hires-33.png" alt="Pokemon Card" class="card-image">
                  </div>
                <?php endif; ?>
              </div>
            </div>

            <button class="carousel-nav next" aria-label="Next">
              <svg viewBox="0 0 24 24" fill="none">
                <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </button>
          </div>

          <div class="gallery-info">
            <?php
            // Display info for the center product (index 2 or first one)
            if (!empty($products)) :
                $display_product = isset($products[2]) ? $products[2] : $products[0];
                $display_title = $display_product->get_name();
                $display_price = $display_product->get_price();
                $current_bid = get_post_meta($display_product->get_id(), '_auction_current_bid', true);
                $start_price = get_post_meta($display_product->get_id(), '_auction_start_price', true);
                $auction_started = get_post_meta($display_product->get_id(), '_auction_started', true);
                ?>
                <h3 class="info-title"><?php echo esc_html($display_title); ?></h3>
                <p class="info-subtitle">
                  <?php if ($current_bid) : ?>
                    Current bid: € <?php echo number_format((float)$current_bid, 2, ',', '.'); ?>
                  <?php elseif ($start_price) : ?>
                    Starting bid: € <?php echo number_format((float)$start_price, 2, ',', '.'); ?>
                  <?php elseif ($display_price) : ?>
                    Price: € <?php echo number_format((float)$display_price, 2, ',', '.'); ?>
                  <?php else : ?>
                    View product for pricing
                  <?php endif; ?>
                </p>
                <div class="info-status">
                  <span><?php echo $auction_started ? 'Auction in progress' : 'Available'; ?></span>
                </div>
            <?php else : ?>
                <h3 class="info-title">Meloetta ex - 159</h3>
                <p class="info-subtitle">Starting bid: € 25,00</p>
                <div class="info-status">
                  <span>Auction not started</span>
                </div>
            <?php endif; ?>
          </div>
        </div>
      </section>

      <!-- Top4 Section - Top 4 Verkauft (WooCommerce In-Stock Items) -->
      <section class="top4">
        <div class="top4-container">
          <div class="top4-header">
            <h2 class="top4-title">Top 4 Verkauft</h2>
            <button class="view-all-button">Alle ansehen</button>
          </div>

          <div class="carousel-wrapper">
            <button class="carousel-nav prev" aria-label="Previous">
              <svg viewBox="0 0 24 24" fill="none">
                <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </button>

            <div class="carousel-container">
              <div class="carousel-track">
                <?php
                // Get top products using wc_get_products (recommended method)
                $top4_products = wc_get_products(array(
                    'limit' => 4,
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'status' => 'publish'
                ));

                if (!empty($top4_products)) :
                    foreach ($top4_products as $product) :
                        $product_id = $product->get_id();
                        $product_url = get_permalink($product_id);
                        $product_title = $product->get_name();
                        $product_image = wp_get_attachment_image_url($product->get_image_id(), 'large');
                        if (!$product_image) {
                            $product_image = 'https://cardbid.eu/wp-content/uploads/2025/08/166_hires-33.png';
                        }
                        ?>
                        <div class="top4-card">
                          <a href="<?php echo esc_url($product_url); ?>">
                            <div class="card-badge">
                              <span>In Stock</span>
                            </div>
                            <img src="<?php echo esc_url($product_image); ?>" alt="<?php echo esc_attr($product_title); ?>" class="card-image">
                            <h3 class="card-title"><?php echo esc_html($product_title); ?></h3>
                            <p class="card-price"><?php echo $product->get_price_html(); ?></p>
                          </a>
                        </div>
                        <?php
                    endforeach;
                else : ?>
                  <!-- Fallback cards if no products found -->
                  <div class="top4-card">
                    <div class="card-badge">
                      <span>In Stock</span>
                    </div>
                    <img src="https://cardbid.eu/wp-content/uploads/2025/08/166_hires-33.png" alt="Pokemon Card" class="card-image">
                    <h3 class="card-title">Team Rocket's Spidops</h3>
                    <p class="card-price">€ 182,00</p>
                  </div>
                  <div class="top4-card">
                    <div class="card-badge">
                      <span>In Stock</span>
                    </div>
                    <img src="https://cardbid.eu/wp-content/uploads/2025/08/166_hires-33.png" alt="Pokemon Card" class="card-image">
                    <h3 class="card-title">Toxicroak ex</h3>
                    <p class="card-price">€ 119,00</p>
                  </div>
                  <div class="top4-card">
                    <div class="card-badge">
                      <span>In Stock</span>
                    </div>
                    <img src="https://cardbid.eu/wp-content/uploads/2025/08/166_hires-33.png" alt="Pokemon Card" class="card-image">
                    <h3 class="card-title">Pikachu on the Ball</h3>
                    <p class="card-price">€ 99,00</p>
                  </div>
                  <div class="top4-card">
                    <div class="card-badge">
                      <span>In Stock</span>
                    </div>
                    <img src="https://cardbid.eu/wp-content/uploads/2025/08/166_hires-33.png" alt="Pokemon Card" class="card-image">
                    <h3 class="card-title">Gyarados ex</h3>
                    <p class="card-price">€ 105,00</p>
                  </div>
                <?php endif; ?>
              </div>
            </div>

            <button class="carousel-nav next" aria-label="Next">
              <svg viewBox="0 0 24 24" fill="none">
                <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </button>
          </div>
        </div>
      </section>

      <!-- PreFooter Section -->
      <section class="pre-footer">
        <div class="pre-footer-container">
          <h2 class="pre-footer-title">Neu im TCG Karten Hobby?</h2>
          <div class="pre-footer-buttons">
            <button class="contact-button">Kontaktformular</button>
            <button class="contact-button">Kontakt per Whatsapp</button>
            <button class="contact-button">Chatbot starten</button>
          </div>
        </div>
      </section>

      <!-- Footer Section -->
      <footer class="footer">
        <div class="footer-content">
          <div class="footer-section footer-nav">
            <a href="#home">Home</a>
            <a href="#shop">Shop</a>
            <a href="#dashboard">Dashboard</a>
            <a href="#account">Account</a>
          </div>

          <div class="footer-section footer-logo">
            <div class="footer-logo-icon">
              <svg viewBox="0 0 74 58" fill="none">
                <path d="M67.5096 34.0127C65.6908 30.992 62.7747 28.9468 59.5472 27.5559C59.2883 27.4444 58.0789 27.0224 58.0039 26.8476C57.9742 26.7728 57.9833 26.4599 57.9897 26.2428C58.1505 20.7784 58.3419 15.3308 58.5436 9.87046C58.5436 7.93362 58.7656 5.55918 57.379 4.18635C56.4841 3.44274 55.6166 3.09566 54.4746 3.11779C52.3343 3.15929 50.0657 3.45373 47.917 3.57564C42.1417 3.90319 33.173 4.22612 27.4011 4.58693C24.5716 4.74659 23.0673 5.50351 22.5964 8.41432C21.747 13.6574 21.5515 19.5451 21.2731 24.859C21.2386 25.5173 21.2076 26.2165 21.186 26.872C17.7607 27.5876 13.4653 25.5582 11.4377 22.5885C11.9296 20.2589 11.884 18.2214 9.18876 17.3145L10.7778 13.6163C10.7823 13.6059 10.7949 13.6011 10.8054 13.6054C12.345 14.2316 11.7786 14.2412 12.2425 14.8791C12.5473 15.2984 13.2176 15.7248 13.7433 15.7962C17.4731 16.3021 20.4186 10.8836 20.2473 7.75604C20.1434 5.85868 18.8797 4.66908 16.9143 4.85896C16.544 4.89468 16.0515 5.12302 16.0515 5.12302C15.2814 4.87429 10.5984 2.91721 9.49082 2.40961C9.39573 1.75291 9.19007 0.744506 7.76042 0.195691C3.44297 -1.28994 -0.125471 6.07503 1.27935 9.46004C1.67182 10.4052 2.67381 11.0721 3.71771 11.1169C4.1597 11.1358 4.61293 10.9082 4.97998 10.9682C5.32688 11.0248 6.22735 11.4925 6.6261 11.6596C6.80547 11.7422 6.77494 11.71 6.74952 11.7963L4.96523 15.792C2.60224 15.6533 1.18587 17.4583 0.65786 19.516C0.278975 20.9925 0.263639 22.2883 1.21494 23.5574C0.85446 24.5039 0.0930383 25.5909 0.0112436 26.6036C-0.263499 30.0115 4.47432 30.1014 4.88519 27.0207C5.32965 27.3222 6.16308 27.8302 7.22101 27.5675C7.49649 27.7942 8.99245 28.9746 9.56005 29.3455C13.0331 31.6151 16.8158 32.7733 20.9925 32.0769C20.8731 34.0512 20.605 40.1556 20.5741 42.139C20.521 45.5676 21.3934 47.1631 24.5999 47.4292C24.8719 47.4599 25.1875 47.4503 25.4233 47.4503C25.5248 47.4581 25.5829 47.4365 25.5829 47.5683C25.5449 47.8204 25.2223 48.4112 25.1211 48.7711C24.9668 49.3198 24.817 49.8926 24.8321 50.4643C23.2138 49.9412 21.7761 48.9844 19.9814 49.5173C18.016 50.101 17.5149 52.1573 18.8001 53.6744C20.0482 55.1476 25.7782 57.8464 27.6647 57.6114C29.6076 57.3694 29.252 55.3511 29.4224 54.0049C29.6978 51.8287 30.0656 49.5726 31.1999 47.6593L45.1877 48.0699C45.7187 49.7156 46.4159 51.5312 48.0584 52.3966C47.4589 52.8326 46.8412 53.0902 46.3247 53.6812C44.9487 55.2558 45.0651 57.6078 47.4966 57.9115C48.6683 58.0579 50.9567 57.9993 51.3363 57.9118C52.0273 57.7689 52.5874 57.6613 53.2108 57.3157C55.4424 56.0787 56.9427 51.3901 54.0506 50.1447C53.5409 49.9251 53.2015 49.985 52.735 49.8731C52.1158 49.7244 51.078 49.0627 50.8879 48.448C50.8744 48.3468 51.0009 48.3503 51.0082 48.3503H53.6029C56.0463 48.3503 57.4268 46.366 57.4268 44.4462L57.7053 32.5372C58.7501 32.9738 59.762 33.4928 60.6518 34.1946C61.0326 34.4948 62.4309 35.825 62.5397 36.2124C62.6032 36.438 61.7546 37.2816 61.5615 37.5649C61.2453 38.0287 60.9231 38.648 60.7804 39.1883C59.9209 42.4404 63.041 44.3135 65.2433 41.6406C66.4146 42.8589 68.0017 44.8301 69.9402 44.4104C70.8423 44.215 71.5787 43.4919 71.9185 42.6754C72.0185 42.4351 72.0488 41.9976 72.1782 41.827C72.2985 41.6682 72.757 41.5483 72.9637 41.4031C73.6442 41.0246 74 40.329 74 39.7082V39.3956C74 36.247 70.1983 34.6393 67.5096 34.0131V34.0127Z" fill="#6974DC"/>
              </svg>
            </div>
            <span class="logo-text">Cardbid</span>
          </div>

          <div class="footer-section footer-contact">
            <h4>Kontakt</h4>
            <p>info@cardbid.eu</p>
            <p>+49 123 456 789</p>
          </div>

          <div class="footer-section footer-social">
            <h4>Folge uns</h4>
            <div class="social-links">
              <a href="#" aria-label="Facebook">FB</a>
              <a href="#" aria-label="Instagram">IG</a>
              <a href="#" aria-label="Twitter">TW</a>
            </div>
          </div>
        </div>

        <div class="footer-bottom">
          <p>&copy; <?php echo date('Y'); ?> Cardbid. Alle Rechte vorbehalten.</p>
          <div class="footer-links">
            <a href="#">Impressum</a>
            <a href="#">Datenschutz</a>
            <a href="#">AGB</a>
          </div>
        </div>
      </footer>

    </div>
  </div>

  <script src="<?php echo get_stylesheet_directory_uri(); ?>/script.js"></script>
  <?php wp_footer(); ?>
</body>
</html>
