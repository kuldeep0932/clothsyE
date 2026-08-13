<?php
session_start();
$isLoggedIn = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
$pageTitle = "Dashboard";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>



    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/5.3.5/apexcharts-legend.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/5.3.5/apexcharts.min.css"/>
    <link rel="stylesheet" href="./components/dashboard.css">
</head>

<body>

    <main class="main_page layout-wrapper layout-content-navbar">
        <div class="layout_container layout-container">
            <?php include('./components/sidebar.php'); ?>
            <div class="main_content_container layout-page">
                <?php include('./components/nav_bar.php') ?>


                <!-- dashboard content container -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">

                        <div class="row">
                            <div class="col-md-12 col-xxl-4 mb-6">
                                <div class="card h-100">
                                    <div class="d-flex align-items-end row">
                                        <div class="col-7">
                                            <div class="card-body">
                                                <h5 class="card-title mb-1 text-nowrap">Congratulations <?php echo $_SESSION['user_name']; ?>! 🎉</h5>
                                                <p class="card-subtitle text-nowrap mb-3">Best seller of the month</p>

                                                <h5 class="card-title text-primary mb-0">$48.9k</h5>
                                                <p class="mb-3">78% of target 🚀</p>

                                                <a href="javascript:;" class="btn btn-sm btn-primary mb-1">View
                                                    sales</a>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="card-body pb-0 text-end">
                                                <img src="./components/img/prize-light.png" width="91"
                                                    height="144" class="rounded-start" alt="View Sales">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- New Visitors & Activity -->
                            <div class="col-xxl-8 mb-6">
                                <div class="card h-100">
                                    <div class="card-body row g-4 p-0">
                                        <div class="col-md-6 card-separator">
                                            <div class="p-6">
                                                <div
                                                    class="card-title d-flex align-items-start justify-content-between">
                                                    <h5 class="mb-0">New Visitors</h5>
                                                    <small>Last Week</small>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <div class="mt-auto">
                                                        <h3 class="mb-1">23%</h3>
                                                        <small class="text-danger text-nowrap fw-medium"><i
                                                                class="icon-base bx bx-down-arrow-alt"></i>
                                                            -13.24%</small>
                                                    </div>
                                                    <div id="visitorsChart" style="min-height: 120px;">
                                                        <div id="apexchartsogtthehm"
                                                            class="apexcharts-canvas apexchartsogtthehm apexcharts-theme-"
                                                            style="width: 200px; height: 120px;"><svg
                                                                xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                class="apexcharts-svg" xmlns:data="ApexChartsNS"
                                                                transform="translate(0, 0)" width="200" height="120">
                                                                <foreignObject x="0" y="0" width="200" height="120">
                                                                    <div class="apexcharts-legend"
                                                                        xmlns="http://www.w3.org/1999/xhtml"
                                                                        style="max-height: 60px;"></div>
                                                                    <style type="text/css">
                                                                        .apexcharts-flip-y {
                                                                            transform: scaleY(-1) translateY(-100%);
                                                                            transform-origin: top;
                                                                            transform-box: fill-box;
                                                                        }

                                                                        .apexcharts-flip-x {
                                                                            transform: scaleX(-1);
                                                                            transform-origin: center;
                                                                            transform-box: fill-box;
                                                                        }

                                                                        .apexcharts-legend {
                                                                            display: flex;
                                                                            overflow: auto;
                                                                            padding: 0 10px;
                                                                        }

                                                                        .apexcharts-legend.apexcharts-legend-group-horizontal {
                                                                            flex-direction: column;
                                                                        }

                                                                        .apexcharts-legend-group {
                                                                            display: flex;
                                                                        }

                                                                        .apexcharts-legend-group-vertical {
                                                                            flex-direction: column-reverse;
                                                                        }

                                                                        .apexcharts-legend.apx-legend-position-bottom,
                                                                        .apexcharts-legend.apx-legend-position-top {
                                                                            flex-wrap: wrap
                                                                        }

                                                                        .apexcharts-legend.apx-legend-position-right,
                                                                        .apexcharts-legend.apx-legend-position-left {
                                                                            flex-direction: column;
                                                                            bottom: 0;
                                                                        }

                                                                        .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-left,
                                                                        .apexcharts-legend.apx-legend-position-top.apexcharts-align-left,
                                                                        .apexcharts-legend.apx-legend-position-right,
                                                                        .apexcharts-legend.apx-legend-position-left {
                                                                            justify-content: flex-start;
                                                                            align-items: flex-start;
                                                                        }

                                                                        .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-center,
                                                                        .apexcharts-legend.apx-legend-position-top.apexcharts-align-center {
                                                                            justify-content: center;
                                                                            align-items: center;
                                                                        }

                                                                        .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-right,
                                                                        .apexcharts-legend.apx-legend-position-top.apexcharts-align-right {
                                                                            justify-content: flex-end;
                                                                            align-items: flex-end;
                                                                        }

                                                                        .apexcharts-legend-series {
                                                                            cursor: pointer;
                                                                            line-height: normal;
                                                                            display: flex;
                                                                            align-items: center;
                                                                        }

                                                                        .apexcharts-legend-text {
                                                                            position: relative;
                                                                            font-size: 14px;
                                                                        }

                                                                        .apexcharts-legend-text *,
                                                                        .apexcharts-legend-marker * {
                                                                            pointer-events: none;
                                                                        }

                                                                        .apexcharts-legend-marker {
                                                                            position: relative;
                                                                            display: flex;
                                                                            align-items: center;
                                                                            justify-content: center;
                                                                            cursor: pointer;
                                                                            margin-right: 1px;
                                                                        }

                                                                        .apexcharts-legend-series.apexcharts-no-click {
                                                                            cursor: auto;
                                                                        }

                                                                        .apexcharts-legend .apexcharts-hidden-zero-series,
                                                                        .apexcharts-legend .apexcharts-hidden-null-series {
                                                                            display: none !important;
                                                                        }

                                                                        .apexcharts-inactive-legend {
                                                                            opacity: 0.45;
                                                                        }
                                                                    </style>
                                                                </foreignObject>
                                                                <g class="apexcharts-datalabels-group"
                                                                    transform="translate(0, 0) scale(1)"></g>
                                                                <g class="apexcharts-datalabels-group"
                                                                    transform="translate(0, 0) scale(1)"></g>
                                                                <g class="apexcharts-yaxis" rel="0"
                                                                    transform="translate(-8, 0)">
                                                                    <g class="apexcharts-yaxis-texts-g"></g>
                                                                </g>
                                                                <g class="apexcharts-inner apexcharts-graphical"
                                                                    transform="translate(22, 5)">
                                                                    <defs>
                                                                        <linearGradient x1="0" y1="0" x2="0" y2="1"
                                                                            id="SvgjsLinearGradient1106">
                                                                            <stop stop-opacity="0.4"
                                                                                stop-color="rgba(216,227,240,0.4)"
                                                                                offset="0"></stop>
                                                                            <stop stop-opacity="0.5"
                                                                                stop-color="rgba(190,209,230,0.5)"
                                                                                offset="1"></stop>
                                                                            <stop stop-opacity="0.5"
                                                                                stop-color="rgba(190,209,230,0.5)"
                                                                                offset="1"></stop>
                                                                        </linearGradient>
                                                                        <clipPath id="gridRectMaskogtthehm">
                                                                            <rect width="168" height="87.72999999999999"
                                                                                x="0" y="0" rx="0" ry="0" opacity="1"
                                                                                stroke-width="0" stroke="none"
                                                                                stroke-dasharray="0" fill="#fff"></rect>
                                                                        </clipPath>
                                                                        <clipPath id="gridRectBarMaskogtthehm">
                                                                            <rect width="172" height="91.72999999999999"
                                                                                x="-2" y="-2" rx="0" ry="0" opacity="1"
                                                                                stroke-width="0" stroke="none"
                                                                                stroke-dasharray="0" fill="#fff"></rect>
                                                                        </clipPath>
                                                                        <clipPath id="gridRectMarkerMaskogtthehm">
                                                                            <rect width="168" height="87.72999999999999"
                                                                                x="0" y="0" rx="0" ry="0" opacity="1"
                                                                                stroke-width="0" stroke="none"
                                                                                stroke-dasharray="0" fill="#fff"></rect>
                                                                        </clipPath>
                                                                        <clipPath id="forecastMaskogtthehm"></clipPath>
                                                                        <clipPath id="nonForecastMaskogtthehm">
                                                                        </clipPath>
                                                                    </defs>
                                                                    <rect width="14.4" height="87.72999999999999" x="0"
                                                                        y="0" rx="0" ry="0" opacity="1" stroke-width="0"
                                                                        stroke="#b6b6b6" stroke-dasharray="3"
                                                                        fill="url(#SvgjsLinearGradient1106)"
                                                                        class="apexcharts-xcrosshairs"
                                                                        y2="87.72999999999999" filter="none"
                                                                        fill-opacity="0.9"></rect>
                                                                    <g class="apexcharts-grid">
                                                                        <g class="apexcharts-gridlines-horizontal"
                                                                            style="display: none;">
                                                                            <line x1="0" y1="0" x2="168" y2="0"
                                                                                stroke="#e0e0e0" stroke-dasharray="0"
                                                                                stroke-linecap="butt"
                                                                                class="apexcharts-gridline"></line>
                                                                            <line x1="0" y1="43.864999999999995"
                                                                                x2="168" y2="43.864999999999995"
                                                                                stroke="#e0e0e0" stroke-dasharray="0"
                                                                                stroke-linecap="butt"
                                                                                class="apexcharts-gridline"></line>
                                                                            <line x1="0" y1="87.72999999999999" x2="168"
                                                                                y2="87.72999999999999" stroke="#e0e0e0"
                                                                                stroke-dasharray="0"
                                                                                stroke-linecap="butt"
                                                                                class="apexcharts-gridline"></line>
                                                                        </g>
                                                                        <g class="apexcharts-gridlines-vertical"
                                                                            style="display: none;"></g>
                                                                        <line x1="0" y1="87.72999999999999" x2="168"
                                                                            y2="87.72999999999999" stroke="transparent"
                                                                            stroke-dasharray="0" stroke-linecap="butt">
                                                                        </line>
                                                                        <line x1="0" y1="1" x2="0"
                                                                            y2="87.72999999999999" stroke="transparent"
                                                                            stroke-dasharray="0" stroke-linecap="butt">
                                                                        </line>
                                                                    </g>
                                                                    <g class="apexcharts-grid-borders"
                                                                        style="display: none;"></g>
                                                                    <g
                                                                        class="apexcharts-bar-series apexcharts-plot-series">
                                                                        <g class="apexcharts-series" rel="1"
                                                                            seriesName="series-1" data:realIndex="0">
                                                                            <path
                                                                                d="M 4.8 80.731 L 4.8 59.63899999999999 C 4.8 56.13899999999999 8.3 52.63899999999999 11.8 52.63899999999999 L 12.2 52.63899999999999 C 15.7 52.63899999999999 19.2 56.13899999999999 19.2 59.63899999999999 L 19.2 80.731 C 19.2 84.231 15.7 87.731 12.2 87.731 L 11.8 87.731 C 8.3 87.731 4.8 84.231 4.8 80.731 Z "
                                                                                fill="var(--bs-primary-bg-subtle)"
                                                                                fill-opacity="1"
                                                                                stroke="var(--bs-primary-bg-subtle)"
                                                                                stroke-opacity="1"
                                                                                stroke-linecap="round" stroke-width="0"
                                                                                stroke-dasharray="0"
                                                                                class="apexcharts-bar-area undefined"
                                                                                index="0"
                                                                                clip-path="url(#gridRectBarMaskogtthehm)"
                                                                                pathTo="M 4.8 80.731 L 4.8 59.63899999999999 C 4.8 56.13899999999999 8.3 52.63899999999999 11.8 52.63899999999999 L 12.2 52.63899999999999 C 15.7 52.63899999999999 19.2 56.13899999999999 19.2 59.63899999999999 L 19.2 80.731 C 19.2 84.231 15.7 87.731 12.2 87.731 L 11.8 87.731 C 8.3 87.731 4.8 84.231 4.8 80.731 Z "
                                                                                pathFrom="M 4.8 87.731 L 4.8 87.731 L 19.2 87.731 L 19.2 87.731 L 19.2 87.731 L 19.2 87.731 L 19.2 87.731 L 4.8 87.731 Z"
                                                                                cy="52.63799999999999" cx="28.8" j="0"
                                                                                val="40" barHeight="35.092"
                                                                                barWidth="14.4"></path>
                                                                            <path
                                                                                d="M 28.8 80.731 L 28.8 11.3875 C 28.8 7.887499999999999 32.3 4.387499999999998 35.8 4.387499999999998 L 36.2 4.387499999999998 C 39.7 4.387499999999998 43.2 7.887499999999999 43.2 11.3875 L 43.2 80.731 C 43.2 84.231 39.7 87.731 36.2 87.731 L 35.8 87.731 C 32.3 87.731 28.8 84.231 28.8 80.731 Z "
                                                                                fill="var(--bs-primary-bg-subtle)"
                                                                                fill-opacity="1"
                                                                                stroke="var(--bs-primary-bg-subtle)"
                                                                                stroke-opacity="1"
                                                                                stroke-linecap="round" stroke-width="0"
                                                                                stroke-dasharray="0"
                                                                                class="apexcharts-bar-area undefined"
                                                                                index="0"
                                                                                clip-path="url(#gridRectBarMaskogtthehm)"
                                                                                pathTo="M 28.8 80.731 L 28.8 11.3875 C 28.8 7.887499999999999 32.3 4.387499999999998 35.8 4.387499999999998 L 36.2 4.387499999999998 C 39.7 4.387499999999998 43.2 7.887499999999999 43.2 11.3875 L 43.2 80.731 C 43.2 84.231 39.7 87.731 36.2 87.731 L 35.8 87.731 C 32.3 87.731 28.8 84.231 28.8 80.731 Z "
                                                                                pathFrom="M 28.8 87.731 L 28.8 87.731 L 43.2 87.731 L 43.2 87.731 L 43.2 87.731 L 43.2 87.731 L 43.2 87.731 L 28.8 87.731 Z"
                                                                                cy="4.386499999999998" cx="52.8" j="1"
                                                                                val="95" barHeight="83.34349999999999"
                                                                                barWidth="14.4"></path>
                                                                            <path
                                                                                d="M 52.8 80.731 L 52.8 42.09299999999999 C 52.8 38.59299999999999 56.3 35.09299999999999 59.8 35.09299999999999 L 60.2 35.09299999999999 C 63.7 35.09299999999999 67.2 38.59299999999999 67.2 42.09299999999999 L 67.2 80.731 C 67.2 84.231 63.7 87.731 60.2 87.731 L 59.8 87.731 C 56.3 87.731 52.8 84.231 52.8 80.731 Z "
                                                                                fill="var(--bs-primary-bg-subtle)"
                                                                                fill-opacity="1"
                                                                                stroke="var(--bs-primary-bg-subtle)"
                                                                                stroke-opacity="1"
                                                                                stroke-linecap="round" stroke-width="0"
                                                                                stroke-dasharray="0"
                                                                                class="apexcharts-bar-area undefined"
                                                                                index="0"
                                                                                clip-path="url(#gridRectBarMaskogtthehm)"
                                                                                pathTo="M 52.8 80.731 L 52.8 42.09299999999999 C 52.8 38.59299999999999 56.3 35.09299999999999 59.8 35.09299999999999 L 60.2 35.09299999999999 C 63.7 35.09299999999999 67.2 38.59299999999999 67.2 42.09299999999999 L 67.2 80.731 C 67.2 84.231 63.7 87.731 60.2 87.731 L 59.8 87.731 C 56.3 87.731 52.8 84.231 52.8 80.731 Z "
                                                                                pathFrom="M 52.8 87.731 L 52.8 87.731 L 67.2 87.731 L 67.2 87.731 L 67.2 87.731 L 67.2 87.731 L 67.2 87.731 L 52.8 87.731 Z"
                                                                                cy="35.09199999999999" cx="76.8" j="2"
                                                                                val="60" barHeight="52.638"
                                                                                barWidth="14.4"></path>
                                                                            <path
                                                                                d="M 76.8 80.731 L 76.8 55.25249999999999 C 76.8 51.75249999999999 80.3 48.25249999999999 83.8 48.25249999999999 L 84.2 48.25249999999999 C 87.7 48.25249999999999 91.2 51.75249999999999 91.2 55.25249999999999 L 91.2 80.731 C 91.2 84.231 87.7 87.731 84.2 87.731 L 83.8 87.731 C 80.3 87.731 76.8 84.231 76.8 80.731 Z "
                                                                                fill="var(--bs-primary-bg-subtle)"
                                                                                fill-opacity="1"
                                                                                stroke="var(--bs-primary-bg-subtle)"
                                                                                stroke-opacity="1"
                                                                                stroke-linecap="round" stroke-width="0"
                                                                                stroke-dasharray="0"
                                                                                class="apexcharts-bar-area undefined"
                                                                                index="0"
                                                                                clip-path="url(#gridRectBarMaskogtthehm)"
                                                                                pathTo="M 76.8 80.731 L 76.8 55.25249999999999 C 76.8 51.75249999999999 80.3 48.25249999999999 83.8 48.25249999999999 L 84.2 48.25249999999999 C 87.7 48.25249999999999 91.2 51.75249999999999 91.2 55.25249999999999 L 91.2 80.731 C 91.2 84.231 87.7 87.731 84.2 87.731 L 83.8 87.731 C 80.3 87.731 76.8 84.231 76.8 80.731 Z "
                                                                                pathFrom="M 76.8 87.731 L 76.8 87.731 L 91.2 87.731 L 91.2 87.731 L 91.2 87.731 L 91.2 87.731 L 91.2 87.731 L 76.8 87.731 Z"
                                                                                cy="48.25149999999999" cx="100.8" j="3"
                                                                                val="45" barHeight="39.4785"
                                                                                barWidth="14.4"></path>
                                                                            <path
                                                                                d="M 100.8 80.731 L 100.8 15.773999999999996 C 100.8 12.273999999999996 104.3 8.773999999999996 107.8 8.773999999999996 L 108.2 8.773999999999996 C 111.7 8.773999999999996 115.2 12.273999999999996 115.2 15.773999999999996 L 115.2 80.731 C 115.2 84.231 111.7 87.731 108.2 87.731 L 107.8 87.731 C 104.3 87.731 100.8 84.231 100.8 80.731 Z "
                                                                                fill="var(--bs-primary-bg-subtle)"
                                                                                fill-opacity="1"
                                                                                stroke="var(--bs-primary-bg-subtle)"
                                                                                stroke-opacity="1"
                                                                                stroke-linecap="round" stroke-width="0"
                                                                                stroke-dasharray="0"
                                                                                class="apexcharts-bar-area undefined"
                                                                                index="0"
                                                                                clip-path="url(#gridRectBarMaskogtthehm)"
                                                                                pathTo="M 100.8 80.731 L 100.8 15.773999999999996 C 100.8 12.273999999999996 104.3 8.773999999999996 107.8 8.773999999999996 L 108.2 8.773999999999996 C 111.7 8.773999999999996 115.2 12.273999999999996 115.2 15.773999999999996 L 115.2 80.731 C 115.2 84.231 111.7 87.731 108.2 87.731 L 107.8 87.731 C 104.3 87.731 100.8 84.231 100.8 80.731 Z "
                                                                                pathFrom="M 100.8 87.731 L 100.8 87.731 L 115.2 87.731 L 115.2 87.731 L 115.2 87.731 L 115.2 87.731 L 115.2 87.731 L 100.8 87.731 Z"
                                                                                cy="8.772999999999996" cx="124.8" j="4"
                                                                                val="90" barHeight="78.957"
                                                                                barWidth="14.4"></path>
                                                                            <path
                                                                                d="M 124.8 80.731 L 124.8 50.86599999999999 C 124.8 47.36599999999999 128.3 43.86599999999999 131.8 43.86599999999999 L 132.2 43.86599999999999 C 135.7 43.86599999999999 139.2 47.36599999999999 139.2 50.86599999999999 L 139.2 80.731 C 139.2 84.231 135.7 87.731 132.2 87.731 L 131.8 87.731 C 128.3 87.731 124.8 84.231 124.8 80.731 Z "
                                                                                fill="var(--bs-primary)"
                                                                                fill-opacity="1"
                                                                                stroke="var(--bs-primary)"
                                                                                stroke-opacity="1"
                                                                                stroke-linecap="round" stroke-width="0"
                                                                                stroke-dasharray="0"
                                                                                class="apexcharts-bar-area undefined"
                                                                                index="0"
                                                                                clip-path="url(#gridRectBarMaskogtthehm)"
                                                                                pathTo="M 124.8 80.731 L 124.8 50.86599999999999 C 124.8 47.36599999999999 128.3 43.86599999999999 131.8 43.86599999999999 L 132.2 43.86599999999999 C 135.7 43.86599999999999 139.2 47.36599999999999 139.2 50.86599999999999 L 139.2 80.731 C 139.2 84.231 135.7 87.731 132.2 87.731 L 131.8 87.731 C 128.3 87.731 124.8 84.231 124.8 80.731 Z "
                                                                                pathFrom="M 124.8 87.731 L 124.8 87.731 L 139.2 87.731 L 139.2 87.731 L 139.2 87.731 L 139.2 87.731 L 139.2 87.731 L 124.8 87.731 Z"
                                                                                cy="43.864999999999995" cx="148.8" j="5"
                                                                                val="50" barHeight="43.864999999999995"
                                                                                barWidth="14.4"></path>
                                                                            <path
                                                                                d="M 148.8 80.731 L 148.8 28.93349999999999 C 148.8 25.43349999999999 152.3 21.93349999999999 155.8 21.93349999999999 L 156.20000000000002 21.93349999999999 C 159.70000000000002 21.93349999999999 163.20000000000002 25.43349999999999 163.20000000000002 28.93349999999999 L 163.20000000000002 80.731 C 163.20000000000002 84.231 159.70000000000002 87.731 156.20000000000002 87.731 L 155.8 87.731 C 152.3 87.731 148.8 84.231 148.8 80.731 Z "
                                                                                fill="var(--bs-primary-bg-subtle)"
                                                                                fill-opacity="1"
                                                                                stroke="var(--bs-primary-bg-subtle)"
                                                                                stroke-opacity="1"
                                                                                stroke-linecap="round" stroke-width="0"
                                                                                stroke-dasharray="0"
                                                                                class="apexcharts-bar-area undefined"
                                                                                index="0"
                                                                                clip-path="url(#gridRectBarMaskogtthehm)"
                                                                                pathTo="M 148.8 80.731 L 148.8 28.93349999999999 C 148.8 25.43349999999999 152.3 21.93349999999999 155.8 21.93349999999999 L 156.20000000000002 21.93349999999999 C 159.70000000000002 21.93349999999999 163.20000000000002 25.43349999999999 163.20000000000002 28.93349999999999 L 163.20000000000002 80.731 C 163.20000000000002 84.231 159.70000000000002 87.731 156.20000000000002 87.731 L 155.8 87.731 C 152.3 87.731 148.8 84.231 148.8 80.731 Z "
                                                                                pathFrom="M 148.8 87.731 L 148.8 87.731 L 163.20000000000002 87.731 L 163.20000000000002 87.731 L 163.20000000000002 87.731 L 163.20000000000002 87.731 L 163.20000000000002 87.731 L 148.8 87.731 Z"
                                                                                cy="21.93249999999999" cx="172.8" j="6"
                                                                                val="75" barHeight="65.7975"
                                                                                barWidth="14.4"></path>
                                                                            <g class="apexcharts-bar-goals-markers">
                                                                                <g className="apexcharts-bar-goals-groups"
                                                                                    class="apexcharts-hidden-element-shown"
                                                                                    clip-path="url(#gridRectMarkerMaskogtthehm)">
                                                                                </g>
                                                                                <g className="apexcharts-bar-goals-groups"
                                                                                    class="apexcharts-hidden-element-shown"
                                                                                    clip-path="url(#gridRectMarkerMaskogtthehm)">
                                                                                </g>
                                                                                <g className="apexcharts-bar-goals-groups"
                                                                                    class="apexcharts-hidden-element-shown"
                                                                                    clip-path="url(#gridRectMarkerMaskogtthehm)">
                                                                                </g>
                                                                                <g className="apexcharts-bar-goals-groups"
                                                                                    class="apexcharts-hidden-element-shown"
                                                                                    clip-path="url(#gridRectMarkerMaskogtthehm)">
                                                                                </g>
                                                                                <g className="apexcharts-bar-goals-groups"
                                                                                    class="apexcharts-hidden-element-shown"
                                                                                    clip-path="url(#gridRectMarkerMaskogtthehm)">
                                                                                </g>
                                                                                <g className="apexcharts-bar-goals-groups"
                                                                                    class="apexcharts-hidden-element-shown"
                                                                                    clip-path="url(#gridRectMarkerMaskogtthehm)">
                                                                                </g>
                                                                                <g className="apexcharts-bar-goals-groups"
                                                                                    class="apexcharts-hidden-element-shown"
                                                                                    clip-path="url(#gridRectMarkerMaskogtthehm)">
                                                                                </g>
                                                                            </g>
                                                                            <g
                                                                                class="apexcharts-bar-shadows apexcharts-hidden-element-shown">
                                                                            </g>
                                                                        </g>
                                                                        <g class="apexcharts-datalabels apexcharts-hidden-element-shown"
                                                                            data:realIndex="0"></g>
                                                                    </g>
                                                                    <line x1="0" y1="0" x2="168" y2="0" stroke="#b6b6b6"
                                                                        stroke-dasharray="0" stroke-width="1"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-ycrosshairs"></line>
                                                                    <line x1="0" y1="0" x2="168" y2="0" stroke="#b6b6b6"
                                                                        stroke-dasharray="0" stroke-width="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-ycrosshairs-hidden"></line>
                                                                    <g class="apexcharts-xaxis"
                                                                        transform="translate(0, 0)">
                                                                        <g class="apexcharts-xaxis-texts-g"
                                                                            transform="translate(0, -4)"><text x="12"
                                                                                y="115.72999999999999"
                                                                                text-anchor="middle"
                                                                                dominant-baseline="auto"
                                                                                font-size="13px"
                                                                                font-family="Helvetica, Arial, sans-serif"
                                                                                font-weight="400"
                                                                                fill="var(--bs-secondary-color)"
                                                                                class="apexcharts-text apexcharts-xaxis-label "
                                                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                                                <tspan>M</tspan>
                                                                                <title>M</title>
                                                                            </text><text x="36" y="115.72999999999999"
                                                                                text-anchor="middle"
                                                                                dominant-baseline="auto"
                                                                                font-size="13px"
                                                                                font-family="Helvetica, Arial, sans-serif"
                                                                                font-weight="400"
                                                                                fill="var(--bs-secondary-color)"
                                                                                class="apexcharts-text apexcharts-xaxis-label "
                                                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                                                <tspan>T</tspan>
                                                                                <title>T</title>
                                                                            </text><text x="60" y="115.72999999999999"
                                                                                text-anchor="middle"
                                                                                dominant-baseline="auto"
                                                                                font-size="13px"
                                                                                font-family="Helvetica, Arial, sans-serif"
                                                                                font-weight="400"
                                                                                fill="var(--bs-secondary-color)"
                                                                                class="apexcharts-text apexcharts-xaxis-label "
                                                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                                                <tspan>W</tspan>
                                                                                <title>W</title>
                                                                            </text><text x="84" y="115.72999999999999"
                                                                                text-anchor="middle"
                                                                                dominant-baseline="auto"
                                                                                font-size="13px"
                                                                                font-family="Helvetica, Arial, sans-serif"
                                                                                font-weight="400"
                                                                                fill="var(--bs-secondary-color)"
                                                                                class="apexcharts-text apexcharts-xaxis-label "
                                                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                                                <tspan>T</tspan>
                                                                                <title>T</title>
                                                                            </text><text x="108" y="115.72999999999999"
                                                                                text-anchor="middle"
                                                                                dominant-baseline="auto"
                                                                                font-size="13px"
                                                                                font-family="Helvetica, Arial, sans-serif"
                                                                                font-weight="400"
                                                                                fill="var(--bs-secondary-color)"
                                                                                class="apexcharts-text apexcharts-xaxis-label "
                                                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                                                <tspan>F</tspan>
                                                                                <title>F</title>
                                                                            </text><text x="132" y="115.72999999999999"
                                                                                text-anchor="middle"
                                                                                dominant-baseline="auto"
                                                                                font-size="13px"
                                                                                font-family="Helvetica, Arial, sans-serif"
                                                                                font-weight="400"
                                                                                fill="var(--bs-secondary-color)"
                                                                                class="apexcharts-text apexcharts-xaxis-label "
                                                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                                                <tspan>S</tspan>
                                                                                <title>S</title>
                                                                            </text><text x="156" y="115.72999999999999"
                                                                                text-anchor="middle"
                                                                                dominant-baseline="auto"
                                                                                font-size="13px"
                                                                                font-family="Helvetica, Arial, sans-serif"
                                                                                font-weight="400"
                                                                                fill="var(--bs-secondary-color)"
                                                                                class="apexcharts-text apexcharts-xaxis-label "
                                                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                                                <tspan>S</tspan>
                                                                                <title>S</title>
                                                                            </text></g>
                                                                    </g>
                                                                    <g class="apexcharts-yaxis-annotations"></g>
                                                                    <g class="apexcharts-xaxis-annotations"></g>
                                                                    <g class="apexcharts-point-annotations"></g>
                                                                </g>
                                                            </svg>
                                                            <div class="apexcharts-tooltip apexcharts-theme-light">
                                                                <div class="apexcharts-tooltip-title"
                                                                    style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                                </div>
                                                                <div class="apexcharts-tooltip-series-group apexcharts-tooltip-series-group-0"
                                                                    style="order: 1;"><span
                                                                        class="apexcharts-tooltip-marker"
                                                                        style="background-color: var(--bs-primary-bg-subtle);"></span>
                                                                    <div class="apexcharts-tooltip-text"
                                                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                                        <div class="apexcharts-tooltip-y-group"><span
                                                                                class="apexcharts-tooltip-text-y-label"></span><span
                                                                                class="apexcharts-tooltip-text-y-value"></span>
                                                                        </div>
                                                                        <div class="apexcharts-tooltip-goals-group">
                                                                            <span
                                                                                class="apexcharts-tooltip-text-goals-label"></span><span
                                                                                class="apexcharts-tooltip-text-goals-value"></span>
                                                                        </div>
                                                                        <div class="apexcharts-tooltip-z-group"><span
                                                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                                                class="apexcharts-tooltip-text-z-value"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                                                <div class="apexcharts-yaxistooltip-text"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="p-6">
                                                <div
                                                    class="card-title d-flex align-items-start justify-content-between">
                                                    <h5 class="mb-0">Activity</h5>
                                                    <small>Last Week</small>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <div class="mt-auto">
                                                        <h3 class="mb-1">82%</h3>
                                                        <small class="text-success text-nowrap fw-medium"><i
                                                                class="icon-base bx bx-up-arrow-alt"></i> 24.8%</small>
                                                    </div>
                                                    <div id="activityChart" style="min-height: 110px;">
                                                        <div id="apexchartsan9gzmq5"
                                                            class="apexcharts-canvas apexchartsan9gzmq5 apexcharts-theme-"
                                                            style="width: 220px; height: 110px;"><svg
                                                                xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                class="apexcharts-svg apexcharts-zoomable"
                                                                xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                                width="220" height="110">
                                                                <foreignObject x="0" y="0" width="220" height="110">
                                                                    <div class="apexcharts-legend"
                                                                        xmlns="http://www.w3.org/1999/xhtml"
                                                                        style="max-height: 55px;"></div>
                                                                    <style type="text/css">
                                                                        .apexcharts-flip-y {
                                                                            transform: scaleY(-1) translateY(-100%);
                                                                            transform-origin: top;
                                                                            transform-box: fill-box;
                                                                        }

                                                                        .apexcharts-flip-x {
                                                                            transform: scaleX(-1);
                                                                            transform-origin: center;
                                                                            transform-box: fill-box;
                                                                        }

                                                                        .apexcharts-legend {
                                                                            display: flex;
                                                                            overflow: auto;
                                                                            padding: 0 10px;
                                                                        }

                                                                        .apexcharts-legend.apexcharts-legend-group-horizontal {
                                                                            flex-direction: column;
                                                                        }

                                                                        .apexcharts-legend-group {
                                                                            display: flex;
                                                                        }

                                                                        .apexcharts-legend-group-vertical {
                                                                            flex-direction: column-reverse;
                                                                        }

                                                                        .apexcharts-legend.apx-legend-position-bottom,
                                                                        .apexcharts-legend.apx-legend-position-top {
                                                                            flex-wrap: wrap
                                                                        }

                                                                        .apexcharts-legend.apx-legend-position-right,
                                                                        .apexcharts-legend.apx-legend-position-left {
                                                                            flex-direction: column;
                                                                            bottom: 0;
                                                                        }

                                                                        .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-left,
                                                                        .apexcharts-legend.apx-legend-position-top.apexcharts-align-left,
                                                                        .apexcharts-legend.apx-legend-position-right,
                                                                        .apexcharts-legend.apx-legend-position-left {
                                                                            justify-content: flex-start;
                                                                            align-items: flex-start;
                                                                        }

                                                                        .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-center,
                                                                        .apexcharts-legend.apx-legend-position-top.apexcharts-align-center {
                                                                            justify-content: center;
                                                                            align-items: center;
                                                                        }

                                                                        .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-right,
                                                                        .apexcharts-legend.apx-legend-position-top.apexcharts-align-right {
                                                                            justify-content: flex-end;
                                                                            align-items: flex-end;
                                                                        }

                                                                        .apexcharts-legend-series {
                                                                            cursor: pointer;
                                                                            line-height: normal;
                                                                            display: flex;
                                                                            align-items: center;
                                                                        }

                                                                        .apexcharts-legend-text {
                                                                            position: relative;
                                                                            font-size: 14px;
                                                                        }

                                                                        .apexcharts-legend-text *,
                                                                        .apexcharts-legend-marker * {
                                                                            pointer-events: none;
                                                                        }

                                                                        .apexcharts-legend-marker {
                                                                            position: relative;
                                                                            display: flex;
                                                                            align-items: center;
                                                                            justify-content: center;
                                                                            cursor: pointer;
                                                                            margin-right: 1px;
                                                                        }

                                                                        .apexcharts-legend-series.apexcharts-no-click {
                                                                            cursor: auto;
                                                                        }

                                                                        .apexcharts-legend .apexcharts-hidden-zero-series,
                                                                        .apexcharts-legend .apexcharts-hidden-null-series {
                                                                            display: none !important;
                                                                        }

                                                                        .apexcharts-inactive-legend {
                                                                            opacity: 0.45;
                                                                        }
                                                                    </style>
                                                                </foreignObject>
                                                                <rect width="0" height="0" x="0" y="0" rx="0" ry="0"
                                                                    opacity="1" stroke-width="0" stroke="none"
                                                                    stroke-dasharray="0" fill="#fefefe"></rect>
                                                                <g class="apexcharts-datalabels-group"
                                                                    transform="translate(0, 0) scale(1)"></g>
                                                                <g class="apexcharts-datalabels-group"
                                                                    transform="translate(0, 0) scale(1)"></g>
                                                                <g class="apexcharts-yaxis" rel="0"
                                                                    transform="translate(-8, 0)">
                                                                    <g class="apexcharts-yaxis-texts-g"></g>
                                                                </g>
                                                                <g class="apexcharts-inner apexcharts-graphical"
                                                                    transform="translate(22, 10)">
                                                                    <defs>
                                                                        <clipPath id="gridRectMaskan9gzmq5">
                                                                            <rect width="188" height="68.72999999999999"
                                                                                x="0" y="0" rx="0" ry="0" opacity="1"
                                                                                stroke-width="0" stroke="none"
                                                                                stroke-dasharray="0" fill="#fff"></rect>
                                                                        </clipPath>
                                                                        <clipPath id="gridRectBarMaskan9gzmq5">
                                                                            <rect width="194" height="74.72999999999999"
                                                                                x="-3" y="-3" rx="0" ry="0" opacity="1"
                                                                                stroke-width="0" stroke="none"
                                                                                stroke-dasharray="0" fill="#fff"></rect>
                                                                        </clipPath>
                                                                        <clipPath id="gridRectMarkerMaskan9gzmq5">
                                                                            <rect width="188" height="68.72999999999999"
                                                                                x="0" y="0" rx="0" ry="0" opacity="1"
                                                                                stroke-width="0" stroke="none"
                                                                                stroke-dasharray="0" fill="#fff"></rect>
                                                                        </clipPath>
                                                                        <clipPath id="forecastMaskan9gzmq5"></clipPath>
                                                                        <clipPath id="nonForecastMaskan9gzmq5">
                                                                        </clipPath>
                                                                        <linearGradient x1="0" y1="0" x2="0" y2="1"
                                                                            id="SvgjsLinearGradient1107">
                                                                            <stop stop-opacity="0.7"
                                                                                stop-color="var(--bs-success)"
                                                                                offset="0"></stop>
                                                                            <stop stop-opacity="0.2"
                                                                                stop-color="var(--bs-paper-bg)"
                                                                                offset="0.85"></stop>
                                                                            <stop stop-opacity="0.2"
                                                                                stop-color="var(--bs-paper-bg)"
                                                                                offset="1"></stop>
                                                                        </linearGradient>
                                                                    </defs>
                                                                    <line x1="0" y1="0" x2="0" y2="68.72999999999999"
                                                                        stroke="#b6b6b6" stroke-dasharray="3"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-xcrosshairs" x="0" y="0"
                                                                        width="1" height="68.72999999999999"
                                                                        fill="#b1b9c4" filter="none" fill-opacity="0.9"
                                                                        stroke-width="1"></line>
                                                                    <g class="apexcharts-grid">
                                                                        <g class="apexcharts-gridlines-horizontal"
                                                                            style="display: none;">
                                                                            <line x1="0" y1="0" x2="188" y2="0"
                                                                                stroke="#e0e0e0" stroke-dasharray="0"
                                                                                stroke-linecap="butt"
                                                                                class="apexcharts-gridline"></line>
                                                                            <line x1="0" y1="34.364999999999995"
                                                                                x2="188" y2="34.364999999999995"
                                                                                stroke="#e0e0e0" stroke-dasharray="0"
                                                                                stroke-linecap="butt"
                                                                                class="apexcharts-gridline"></line>
                                                                            <line x1="0" y1="68.72999999999999" x2="188"
                                                                                y2="68.72999999999999" stroke="#e0e0e0"
                                                                                stroke-dasharray="0"
                                                                                stroke-linecap="butt"
                                                                                class="apexcharts-gridline"></line>
                                                                        </g>
                                                                        <g class="apexcharts-gridlines-vertical"
                                                                            style="display: none;"></g>
                                                                        <line x1="0" y1="68.72999999999999" x2="188"
                                                                            y2="68.72999999999999" stroke="transparent"
                                                                            stroke-dasharray="0" stroke-linecap="butt">
                                                                        </line>
                                                                        <line x1="0" y1="1" x2="0"
                                                                            y2="68.72999999999999" stroke="transparent"
                                                                            stroke-dasharray="0" stroke-linecap="butt">
                                                                        </line>
                                                                    </g>
                                                                    <g class="apexcharts-grid-borders"
                                                                        style="display: none;"></g>
                                                                    <g
                                                                        class="apexcharts-area-series apexcharts-plot-series">
                                                                        <g class="apexcharts-series" zIndex="0"
                                                                            seriesName="series-1"
                                                                            data:longestSeries="true" rel="1"
                                                                            data:realIndex="0">
                                                                            <path
                                                                                d="M 0 42.95625C 10.966666666666667 42.95625 20.366666666666667 30.9285 31.333333333333336 30.9285C 42.300000000000004 30.9285 51.7 39.519749999999995 62.66666666666667 39.519749999999995C 73.63333333333334 39.519749999999995 83.03333333333335 1.7182499999999976 94.00000000000001 1.7182499999999976C 104.96666666666668 1.7182499999999976 114.36666666666667 48.11099999999999 125.33333333333334 48.11099999999999C 136.3 48.11099999999999 145.70000000000002 8.591250000000002 156.66666666666669 8.591250000000002C 167.63333333333335 8.591250000000002 177.03333333333336 25.77375 188.00000000000003 25.77375C 188.00000000000003 25.77375 188.00000000000003 25.77375 188.00000000000003 68.72999999999999 L 0 68.72999999999999z"
                                                                                fill="url(#SvgjsLinearGradient1107)"
                                                                                fill-opacity="1" stroke="none"
                                                                                stroke-opacity="1" stroke-linecap="butt"
                                                                                stroke-width="0" stroke-dasharray="0"
                                                                                class="apexcharts-area" index="0"
                                                                                clip-path="url(#gridRectMaskan9gzmq5)"
                                                                                pathTo="M 0 42.95625C 10.966666666666667 42.95625 20.366666666666667 30.9285 31.333333333333336 30.9285C 42.300000000000004 30.9285 51.7 39.519749999999995 62.66666666666667 39.519749999999995C 73.63333333333334 39.519749999999995 83.03333333333335 1.7182499999999976 94.00000000000001 1.7182499999999976C 104.96666666666668 1.7182499999999976 114.36666666666667 48.11099999999999 125.33333333333334 48.11099999999999C 136.3 48.11099999999999 145.70000000000002 8.591250000000002 156.66666666666669 8.591250000000002C 167.63333333333335 8.591250000000002 177.03333333333336 25.77375 188.00000000000003 25.77375C 188.00000000000003 25.77375 188.00000000000003 25.77375 188.00000000000003 68.72999999999999 L 0 68.72999999999999z"
                                                                                pathFrom="M 0 68.72999999999999 L 0 68.72999999999999 L 31.333333333333336 68.72999999999999 L 62.66666666666667 68.72999999999999 L 94.00000000000001 68.72999999999999 L 125.33333333333334 68.72999999999999 L 156.66666666666669 68.72999999999999 L 188.00000000000003 68.72999999999999z">
                                                                            </path>
                                                                            <path
                                                                                d="M 0 42.95625C 10.966666666666667 42.95625 20.366666666666667 30.9285 31.333333333333336 30.9285C 42.300000000000004 30.9285 51.7 39.519749999999995 62.66666666666667 39.519749999999995C 73.63333333333334 39.519749999999995 83.03333333333335 1.7182499999999976 94.00000000000001 1.7182499999999976C 104.96666666666668 1.7182499999999976 114.36666666666667 48.11099999999999 125.33333333333334 48.11099999999999C 136.3 48.11099999999999 145.70000000000002 8.591250000000002 156.66666666666669 8.591250000000002C 167.63333333333335 8.591250000000002 177.03333333333336 25.77375 188.00000000000003 25.77375"
                                                                                fill="none" fill-opacity="1"
                                                                                stroke="var(--bs-success)"
                                                                                stroke-opacity="1" stroke-linecap="butt"
                                                                                stroke-width="2" stroke-dasharray="0"
                                                                                class="apexcharts-area" index="0"
                                                                                clip-path="url(#gridRectMaskan9gzmq5)"
                                                                                pathTo="M 0 42.95625C 10.966666666666667 42.95625 20.366666666666667 30.9285 31.333333333333336 30.9285C 42.300000000000004 30.9285 51.7 39.519749999999995 62.66666666666667 39.519749999999995C 73.63333333333334 39.519749999999995 83.03333333333335 1.7182499999999976 94.00000000000001 1.7182499999999976C 104.96666666666668 1.7182499999999976 114.36666666666667 48.11099999999999 125.33333333333334 48.11099999999999C 136.3 48.11099999999999 145.70000000000002 8.591250000000002 156.66666666666669 8.591250000000002C 167.63333333333335 8.591250000000002 177.03333333333336 25.77375 188.00000000000003 25.77375"
                                                                                pathFrom="M 0 68.72999999999999 L 0 68.72999999999999 L 31.333333333333336 68.72999999999999 L 62.66666666666667 68.72999999999999 L 94.00000000000001 68.72999999999999 L 125.33333333333334 68.72999999999999 L 156.66666666666669 68.72999999999999 L 188.00000000000003 68.72999999999999"
                                                                                fill-rule="evenodd"></path>
                                                                            <g class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown"
                                                                                data:realIndex="0">
                                                                                <g class="apexcharts-series-markers">
                                                                                    <path d="M 0, 0 
           m -0, 0 
           a 0,0 0 1,0 0,0 
           a 0,0 0 1,0 -0,0" fill="var(--bs-success)" fill-opacity="1" stroke="#ffffff" stroke-opacity="0.9"
                                                                                        stroke-linecap="butt"
                                                                                        stroke-width="2"
                                                                                        stroke-dasharray="0" cx="0"
                                                                                        cy="0" shape="circle"
                                                                                        class="apexcharts-marker w9nxn4j65 no-pointer-events"
                                                                                        default-marker-size="0"></path>
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                        <g class="apexcharts-datalabels"
                                                                            data:realIndex="0"></g>
                                                                    </g>
                                                                    <line x1="0" y1="0" x2="188" y2="0" stroke="#b6b6b6"
                                                                        stroke-dasharray="0" stroke-width="1"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-ycrosshairs"></line>
                                                                    <line x1="0" y1="0" x2="188" y2="0" stroke="#b6b6b6"
                                                                        stroke-dasharray="0" stroke-width="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-ycrosshairs-hidden"></line>
                                                                    <g class="apexcharts-xaxis"
                                                                        transform="translate(0, 0)">
                                                                        <g class="apexcharts-xaxis-texts-g"
                                                                            transform="translate(0, -4)"><text x="0"
                                                                                y="96.72999999999999"
                                                                                text-anchor="middle"
                                                                                dominant-baseline="auto"
                                                                                font-size="13px"
                                                                                font-family="Helvetica, Arial, sans-serif"
                                                                                font-weight="400"
                                                                                fill="var(--bs-secondary-color)"
                                                                                class="apexcharts-text apexcharts-xaxis-label "
                                                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                                                <tspan>Mo</tspan>
                                                                                <title>Mo</title>
                                                                            </text><text x="31.333333333333336"
                                                                                y="96.72999999999999"
                                                                                text-anchor="middle"
                                                                                dominant-baseline="auto"
                                                                                font-size="13px"
                                                                                font-family="Helvetica, Arial, sans-serif"
                                                                                font-weight="400"
                                                                                fill="var(--bs-secondary-color)"
                                                                                class="apexcharts-text apexcharts-xaxis-label "
                                                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                                                <tspan>Tu</tspan>
                                                                                <title>Tu</title>
                                                                            </text><text x="62.666666666666664"
                                                                                y="96.72999999999999"
                                                                                text-anchor="middle"
                                                                                dominant-baseline="auto"
                                                                                font-size="13px"
                                                                                font-family="Helvetica, Arial, sans-serif"
                                                                                font-weight="400"
                                                                                fill="var(--bs-secondary-color)"
                                                                                class="apexcharts-text apexcharts-xaxis-label "
                                                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                                                <tspan>We</tspan>
                                                                                <title>We</title>
                                                                            </text><text x="93.99999999999999"
                                                                                y="96.72999999999999"
                                                                                text-anchor="middle"
                                                                                dominant-baseline="auto"
                                                                                font-size="13px"
                                                                                font-family="Helvetica, Arial, sans-serif"
                                                                                font-weight="400"
                                                                                fill="var(--bs-secondary-color)"
                                                                                class="apexcharts-text apexcharts-xaxis-label "
                                                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                                                <tspan>Th</tspan>
                                                                                <title>Th</title>
                                                                            </text><text x="125.33333333333333"
                                                                                y="96.72999999999999"
                                                                                text-anchor="middle"
                                                                                dominant-baseline="auto"
                                                                                font-size="13px"
                                                                                font-family="Helvetica, Arial, sans-serif"
                                                                                font-weight="400"
                                                                                fill="var(--bs-secondary-color)"
                                                                                class="apexcharts-text apexcharts-xaxis-label "
                                                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                                                <tspan>Fr</tspan>
                                                                                <title>Fr</title>
                                                                            </text><text x="156.66666666666669"
                                                                                y="96.72999999999999"
                                                                                text-anchor="middle"
                                                                                dominant-baseline="auto"
                                                                                font-size="13px"
                                                                                font-family="Helvetica, Arial, sans-serif"
                                                                                font-weight="400"
                                                                                fill="var(--bs-secondary-color)"
                                                                                class="apexcharts-text apexcharts-xaxis-label "
                                                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                                                <tspan>Sa</tspan>
                                                                                <title>Sa</title>
                                                                            </text><text x="188.00000000000003"
                                                                                y="96.72999999999999"
                                                                                text-anchor="middle"
                                                                                dominant-baseline="auto"
                                                                                font-size="13px"
                                                                                font-family="Helvetica, Arial, sans-serif"
                                                                                font-weight="400"
                                                                                fill="var(--bs-secondary-color)"
                                                                                class="apexcharts-text apexcharts-xaxis-label "
                                                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                                                <tspan>Su</tspan>
                                                                                <title>Su</title>
                                                                            </text></g>
                                                                    </g>
                                                                    <g class="apexcharts-yaxis-annotations"></g>
                                                                    <g class="apexcharts-xaxis-annotations"></g>
                                                                    <g class="apexcharts-point-annotations"></g>
                                                                </g>
                                                                <rect width="0" height="0" x="0" y="0" rx="0" ry="0"
                                                                    opacity="1" stroke-width="0" stroke="none"
                                                                    stroke-dasharray="0" fill="#fefefe"
                                                                    class="apexcharts-zoom-rect"></rect>
                                                                <rect width="0" height="0" x="0" y="0" rx="0" ry="0"
                                                                    opacity="1" stroke-width="0" stroke="none"
                                                                    stroke-dasharray="0" fill="#fefefe"
                                                                    class="apexcharts-selection-rect"></rect>
                                                            </svg>
                                                            <div class="apexcharts-tooltip apexcharts-theme-light">
                                                                <div class="apexcharts-tooltip-title"
                                                                    style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                                </div>
                                                                <div class="apexcharts-tooltip-series-group apexcharts-tooltip-series-group-0"
                                                                    style="order: 1;"><span
                                                                        class="apexcharts-tooltip-marker"
                                                                        style="background-color: var(--bs-success);"></span>
                                                                    <div class="apexcharts-tooltip-text"
                                                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                                        <div class="apexcharts-tooltip-y-group"><span
                                                                                class="apexcharts-tooltip-text-y-label"></span><span
                                                                                class="apexcharts-tooltip-text-y-value"></span>
                                                                        </div>
                                                                        <div class="apexcharts-tooltip-goals-group">
                                                                            <span
                                                                                class="apexcharts-tooltip-text-goals-label"></span><span
                                                                                class="apexcharts-tooltip-text-goals-value"></span>
                                                                        </div>
                                                                        <div class="apexcharts-tooltip-z-group"><span
                                                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                                                class="apexcharts-tooltip-text-z-value"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light">
                                                                <div class="apexcharts-xaxistooltip-text"
                                                                    style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                                                <div class="apexcharts-yaxistooltip-text"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/ New Visitors & Activity -->

                            <div class="col-lg-12 col-xxl-4">
                                <div class="row">
                                    <div class="col-xxl-6 col-md-3 col-sm-6 col-12 mb-6">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <div
                                                    class="card-title d-flex align-items-start justify-content-between mb-4">
                                                    <div class="avatar flex-shrink-0 w-px-40 h-px-40">
                                                        <img src="./components/img/wallet-info.png"
                                                            alt="wallet info" class="rounded">
                                                    </div>
                                                    <div class="dropdown">
                                                        <button class="btn p-0" type="button" id="cardOpt6"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i
                                                                class="icon-base bx bx-dots-vertical-rounded text-body-secondary"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end"
                                                            aria-labelledby="cardOpt6">
                                                            <a class="dropdown-item" href="javascript:void(0);">View
                                                                More</a>
                                                            <a class="dropdown-item"
                                                                href="javascript:void(0);">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="mb-1">Sales</p>
                                                <h4 class="card-title mb-3">$4,679</h4>
                                                <small class="text-success fw-medium"><i
                                                        class="icon-base bx bx-up-arrow-alt"></i> +28.42%</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xxl-6 col-md-3 col-sm-6 col-12 mb-6">
                                        <div class="card h-100">
                                            <div class="card-body pb-2">
                                                <span class="d-block fw-medium mb-1">Profit</span>
                                                <h4 class="card-title mb-4">624k</h4>
                                                <div id="profitChart" style="min-height: 105px;">
                                                    <div id="apexcharts659ywi3l"
                                                        class="apexcharts-canvas apexcharts659ywi3l apexcharts-theme-"
                                                        style="width: 162px; height: 90px;"><svg
                                                            xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            class="apexcharts-svg" xmlns:data="ApexChartsNS"
                                                            transform="translate(0, 0)" width="162" height="90">
                                                            <foreignObject x="0" y="0" width="162" height="90">
                                                                <div class="apexcharts-legend"
                                                                    xmlns="http://www.w3.org/1999/xhtml"
                                                                    style="max-height: 45px;"></div>
                                                                <style type="text/css">
                                                                    .apexcharts-flip-y {
                                                                        transform: scaleY(-1) translateY(-100%);
                                                                        transform-origin: top;
                                                                        transform-box: fill-box;
                                                                    }

                                                                    .apexcharts-flip-x {
                                                                        transform: scaleX(-1);
                                                                        transform-origin: center;
                                                                        transform-box: fill-box;
                                                                    }

                                                                    .apexcharts-legend {
                                                                        display: flex;
                                                                        overflow: auto;
                                                                        padding: 0 10px;
                                                                    }

                                                                    .apexcharts-legend.apexcharts-legend-group-horizontal {
                                                                        flex-direction: column;
                                                                    }

                                                                    .apexcharts-legend-group {
                                                                        display: flex;
                                                                    }

                                                                    .apexcharts-legend-group-vertical {
                                                                        flex-direction: column-reverse;
                                                                    }

                                                                    .apexcharts-legend.apx-legend-position-bottom,
                                                                    .apexcharts-legend.apx-legend-position-top {
                                                                        flex-wrap: wrap
                                                                    }

                                                                    .apexcharts-legend.apx-legend-position-right,
                                                                    .apexcharts-legend.apx-legend-position-left {
                                                                        flex-direction: column;
                                                                        bottom: 0;
                                                                    }

                                                                    .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-left,
                                                                    .apexcharts-legend.apx-legend-position-top.apexcharts-align-left,
                                                                    .apexcharts-legend.apx-legend-position-right,
                                                                    .apexcharts-legend.apx-legend-position-left {
                                                                        justify-content: flex-start;
                                                                        align-items: flex-start;
                                                                    }

                                                                    .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-center,
                                                                    .apexcharts-legend.apx-legend-position-top.apexcharts-align-center {
                                                                        justify-content: center;
                                                                        align-items: center;
                                                                    }

                                                                    .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-right,
                                                                    .apexcharts-legend.apx-legend-position-top.apexcharts-align-right {
                                                                        justify-content: flex-end;
                                                                        align-items: flex-end;
                                                                    }

                                                                    .apexcharts-legend-series {
                                                                        cursor: pointer;
                                                                        line-height: normal;
                                                                        display: flex;
                                                                        align-items: center;
                                                                    }

                                                                    .apexcharts-legend-text {
                                                                        position: relative;
                                                                        font-size: 14px;
                                                                    }

                                                                    .apexcharts-legend-text *,
                                                                    .apexcharts-legend-marker * {
                                                                        pointer-events: none;
                                                                    }

                                                                    .apexcharts-legend-marker {
                                                                        position: relative;
                                                                        display: flex;
                                                                        align-items: center;
                                                                        justify-content: center;
                                                                        cursor: pointer;
                                                                        margin-right: 1px;
                                                                    }

                                                                    .apexcharts-legend-series.apexcharts-no-click {
                                                                        cursor: auto;
                                                                    }

                                                                    .apexcharts-legend .apexcharts-hidden-zero-series,
                                                                    .apexcharts-legend .apexcharts-hidden-null-series {
                                                                        display: none !important;
                                                                    }

                                                                    .apexcharts-inactive-legend {
                                                                        opacity: 0.45;
                                                                    }
                                                                </style>
                                                            </foreignObject>
                                                            <g class="apexcharts-datalabels-group"
                                                                transform="translate(0, 0) scale(1)"></g>
                                                            <g class="apexcharts-datalabels-group"
                                                                transform="translate(0, 0) scale(1)"></g>
                                                            <g class="apexcharts-yaxis" rel="0"
                                                                transform="translate(-8, 0)">
                                                                <g class="apexcharts-yaxis-texts-g"></g>
                                                            </g>
                                                            <g class="apexcharts-inner apexcharts-graphical"
                                                                transform="translate(0, 0)">
                                                                <defs>
                                                                    <linearGradient x1="0" y1="0" x2="0" y2="1"
                                                                        id="SvgjsLinearGradient1108">
                                                                        <stop stop-opacity="0.4"
                                                                            stop-color="rgba(216,227,240,0.4)"
                                                                            offset="0"></stop>
                                                                        <stop stop-opacity="0.5"
                                                                            stop-color="rgba(190,209,230,0.5)"
                                                                            offset="1"></stop>
                                                                        <stop stop-opacity="0.5"
                                                                            stop-color="rgba(190,209,230,0.5)"
                                                                            offset="1"></stop>
                                                                    </linearGradient>
                                                                    <clipPath id="gridRectMask659ywi3l">
                                                                        <rect width="150.694091796875" height="62.73"
                                                                            x="0" y="0" rx="0" ry="0" opacity="1"
                                                                            stroke-width="0" stroke="none"
                                                                            stroke-dasharray="0" fill="#fff"></rect>
                                                                    </clipPath>
                                                                    <clipPath id="gridRectBarMask659ywi3l">
                                                                        <rect width="159.694091796875"
                                                                            height="71.72999999999999" x="-4.5" y="-4.5"
                                                                            rx="0" ry="0" opacity="1" stroke-width="0"
                                                                            stroke="none" stroke-dasharray="0"
                                                                            fill="#fff"></rect>
                                                                    </clipPath>
                                                                    <clipPath id="gridRectMarkerMask659ywi3l">
                                                                        <rect width="150.694091796875" height="62.73"
                                                                            x="0" y="0" rx="0" ry="0" opacity="1"
                                                                            stroke-width="0" stroke="none"
                                                                            stroke-dasharray="0" fill="#fff"></rect>
                                                                    </clipPath>
                                                                    <clipPath id="forecastMask659ywi3l"></clipPath>
                                                                    <clipPath id="nonForecastMask659ywi3l"></clipPath>
                                                                </defs>
                                                                <rect width="12.997365417480468" height="62.73" x="0"
                                                                    y="0" rx="0" ry="0" opacity="1" stroke-width="0"
                                                                    stroke="#b6b6b6" stroke-dasharray="3"
                                                                    fill="url(#SvgjsLinearGradient1108)"
                                                                    class="apexcharts-xcrosshairs" y2="62.73"
                                                                    filter="none" fill-opacity="0.9"></rect>
                                                                <g class="apexcharts-grid">
                                                                    <g class="apexcharts-gridlines-horizontal"
                                                                        style="display: none;">
                                                                        <line x1="0" y1="0" x2="150.694091796875" y2="0"
                                                                            stroke="#e0e0e0" stroke-dasharray="0"
                                                                            stroke-linecap="butt"
                                                                            class="apexcharts-gridline"></line>
                                                                        <line x1="0" y1="31.365" x2="150.694091796875"
                                                                            y2="31.365" stroke="#e0e0e0"
                                                                            stroke-dasharray="0" stroke-linecap="butt"
                                                                            class="apexcharts-gridline"></line>
                                                                        <line x1="0" y1="62.73" x2="150.694091796875"
                                                                            y2="62.73" stroke="#e0e0e0"
                                                                            stroke-dasharray="0" stroke-linecap="butt"
                                                                            class="apexcharts-gridline"></line>
                                                                    </g>
                                                                    <g class="apexcharts-gridlines-vertical"
                                                                        style="display: none;"></g>
                                                                    <line x1="0" y1="62.73" x2="150.694091796875"
                                                                        y2="62.73" stroke="transparent"
                                                                        stroke-dasharray="0" stroke-linecap="butt">
                                                                    </line>
                                                                    <line x1="0" y1="1" x2="0" y2="62.73"
                                                                        stroke="transparent" stroke-dasharray="0"
                                                                        stroke-linecap="butt"></line>
                                                                </g>
                                                                <g class="apexcharts-grid-borders"
                                                                    style="display: none;"></g>
                                                                <g class="apexcharts-bar-series apexcharts-plot-series">
                                                                    <g class="apexcharts-series" rel="1"
                                                                        seriesName="series-1" data:realIndex="0">
                                                                        <path
                                                                            d="M 8.339396057128907 57.230999999999995 L 8.339396057128907 22.438100000000002 C 8.339396057128907 20.938100000000002 9.839396057128907 19.438100000000002 11.339396057128907 19.438100000000002 L 13.336761474609375 19.438100000000002 C 14.836761474609375 19.438100000000002 16.336761474609375 20.938100000000002 16.336761474609375 22.438100000000002 L 16.336761474609375 57.230999999999995 C 16.336761474609375 58.730999999999995 14.836761474609375 60.230999999999995 13.336761474609375 60.230999999999995 L 11.339396057128907 60.230999999999995 C 9.839396057128907 60.230999999999995 8.339396057128907 58.730999999999995 8.339396057128907 57.230999999999995 Z "
                                                                            fill="var(--bs-success)" fill-opacity="1"
                                                                            stroke="v" stroke-opacity="1"
                                                                            stroke-linecap="round" stroke-width="5"
                                                                            stroke-dasharray="0"
                                                                            class="apexcharts-bar-area undefined"
                                                                            index="0"
                                                                            clip-path="url(#gridRectBarMask659ywi3l)"
                                                                            pathTo="M 8.339396057128907 57.230999999999995 L 8.339396057128907 22.438100000000002 C 8.339396057128907 20.938100000000002 9.839396057128907 19.438100000000002 11.339396057128907 19.438100000000002 L 13.336761474609375 19.438100000000002 C 14.836761474609375 19.438100000000002 16.336761474609375 20.938100000000002 16.336761474609375 22.438100000000002 L 16.336761474609375 57.230999999999995 C 16.336761474609375 58.730999999999995 14.836761474609375 60.230999999999995 13.336761474609375 60.230999999999995 L 11.339396057128907 60.230999999999995 C 9.839396057128907 60.230999999999995 8.339396057128907 58.730999999999995 8.339396057128907 57.230999999999995 Z "
                                                                            pathFrom="M 8.339396057128907 60.230999999999995 L 8.339396057128907 60.230999999999995 L 16.336761474609375 60.230999999999995 L 16.336761474609375 60.230999999999995 L 16.336761474609375 60.230999999999995 L 16.336761474609375 60.230999999999995 L 16.336761474609375 60.230999999999995 L 8.339396057128907 60.230999999999995 Z"
                                                                            cy="16.9371" cx="41.01291900634766" j="0"
                                                                            val="73" barHeight="45.792899999999996"
                                                                            barWidth="12.997365417480468"></path>
                                                                        <path
                                                                            d="M 46.01291900634766 57.230999999999995 L 46.01291900634766 33.102199999999996 C 46.01291900634766 31.602199999999996 47.51291900634766 30.1022 49.01291900634766 30.1022 L 51.010284423828125 30.1022 C 52.510284423828125 30.1022 54.010284423828125 31.602199999999996 54.010284423828125 33.102199999999996 L 54.010284423828125 57.230999999999995 C 54.010284423828125 58.730999999999995 52.510284423828125 60.230999999999995 51.010284423828125 60.230999999999995 L 49.01291900634766 60.230999999999995 C 47.51291900634766 60.230999999999995 46.01291900634766 58.730999999999995 46.01291900634766 57.230999999999995 Z "
                                                                            fill="var(--bs-success)" fill-opacity="1"
                                                                            stroke="v" stroke-opacity="1"
                                                                            stroke-linecap="round" stroke-width="5"
                                                                            stroke-dasharray="0"
                                                                            class="apexcharts-bar-area undefined"
                                                                            index="0"
                                                                            clip-path="url(#gridRectBarMask659ywi3l)"
                                                                            pathTo="M 46.01291900634766 57.230999999999995 L 46.01291900634766 33.102199999999996 C 46.01291900634766 31.602199999999996 47.51291900634766 30.1022 49.01291900634766 30.1022 L 51.010284423828125 30.1022 C 52.510284423828125 30.1022 54.010284423828125 31.602199999999996 54.010284423828125 33.102199999999996 L 54.010284423828125 57.230999999999995 C 54.010284423828125 58.730999999999995 52.510284423828125 60.230999999999995 51.010284423828125 60.230999999999995 L 49.01291900634766 60.230999999999995 C 47.51291900634766 60.230999999999995 46.01291900634766 58.730999999999995 46.01291900634766 57.230999999999995 Z "
                                                                            pathFrom="M 46.01291900634766 60.230999999999995 L 46.01291900634766 60.230999999999995 L 54.010284423828125 60.230999999999995 L 54.010284423828125 60.230999999999995 L 54.010284423828125 60.230999999999995 L 54.010284423828125 60.230999999999995 L 54.010284423828125 60.230999999999995 L 46.01291900634766 60.230999999999995 Z"
                                                                            cy="27.6012" cx="78.68644195556641" j="1"
                                                                            val="56" barHeight="35.1288"
                                                                            barWidth="12.997365417480468"></path>
                                                                        <path
                                                                            d="M 83.68644195556641 57.230999999999995 L 83.68644195556641 33.102199999999996 C 83.68644195556641 31.602199999999996 85.18644195556641 30.1022 86.68644195556641 30.1022 L 88.68380737304688 30.1022 C 90.18380737304688 30.1022 91.68380737304688 31.602199999999996 91.68380737304688 33.102199999999996 L 91.68380737304688 57.230999999999995 C 91.68380737304688 58.730999999999995 90.18380737304688 60.230999999999995 88.68380737304688 60.230999999999995 L 86.68644195556641 60.230999999999995 C 85.18644195556641 60.230999999999995 83.68644195556641 58.730999999999995 83.68644195556641 57.230999999999995 Z "
                                                                            fill="var(--bs-success)" fill-opacity="1"
                                                                            stroke="v" stroke-opacity="1"
                                                                            stroke-linecap="round" stroke-width="5"
                                                                            stroke-dasharray="0"
                                                                            class="apexcharts-bar-area undefined"
                                                                            index="0"
                                                                            clip-path="url(#gridRectBarMask659ywi3l)"
                                                                            pathTo="M 83.68644195556641 57.230999999999995 L 83.68644195556641 33.102199999999996 C 83.68644195556641 31.602199999999996 85.18644195556641 30.1022 86.68644195556641 30.1022 L 88.68380737304688 30.1022 C 90.18380737304688 30.1022 91.68380737304688 31.602199999999996 91.68380737304688 33.102199999999996 L 91.68380737304688 57.230999999999995 C 91.68380737304688 58.730999999999995 90.18380737304688 60.230999999999995 88.68380737304688 60.230999999999995 L 86.68644195556641 60.230999999999995 C 85.18644195556641 60.230999999999995 83.68644195556641 58.730999999999995 83.68644195556641 57.230999999999995 Z "
                                                                            pathFrom="M 83.68644195556641 60.230999999999995 L 83.68644195556641 60.230999999999995 L 91.68380737304688 60.230999999999995 L 91.68380737304688 60.230999999999995 L 91.68380737304688 60.230999999999995 L 91.68380737304688 60.230999999999995 L 91.68380737304688 60.230999999999995 L 83.68644195556641 60.230999999999995 Z"
                                                                            cy="27.6012" cx="116.35996490478516" j="2"
                                                                            val="56" barHeight="35.1288"
                                                                            barWidth="12.997365417480468"></path>
                                                                        <path
                                                                            d="M 121.35996490478516 57.230999999999995 L 121.35996490478516 5.5009999999999994 C 121.35996490478516 4.0009999999999994 122.85996490478516 2.501 124.35996490478516 2.501 L 126.35733032226562 2.501 C 127.85733032226562 2.501 129.35733032226562 4.0009999999999994 129.35733032226562 5.5009999999999994 L 129.35733032226562 57.230999999999995 C 129.35733032226562 58.730999999999995 127.85733032226562 60.230999999999995 126.35733032226562 60.230999999999995 L 124.35996490478516 60.230999999999995 C 122.85996490478516 60.230999999999995 121.35996490478516 58.730999999999995 121.35996490478516 57.230999999999995 Z "
                                                                            fill="var(--bs-success)" fill-opacity="1"
                                                                            stroke="v" stroke-opacity="1"
                                                                            stroke-linecap="round" stroke-width="5"
                                                                            stroke-dasharray="0"
                                                                            class="apexcharts-bar-area undefined"
                                                                            index="0"
                                                                            clip-path="url(#gridRectBarMask659ywi3l)"
                                                                            pathTo="M 121.35996490478516 57.230999999999995 L 121.35996490478516 5.5009999999999994 C 121.35996490478516 4.0009999999999994 122.85996490478516 2.501 124.35996490478516 2.501 L 126.35733032226562 2.501 C 127.85733032226562 2.501 129.35733032226562 4.0009999999999994 129.35733032226562 5.5009999999999994 L 129.35733032226562 57.230999999999995 C 129.35733032226562 58.730999999999995 127.85733032226562 60.230999999999995 126.35733032226562 60.230999999999995 L 124.35996490478516 60.230999999999995 C 122.85996490478516 60.230999999999995 121.35996490478516 58.730999999999995 121.35996490478516 57.230999999999995 Z "
                                                                            pathFrom="M 121.35996490478516 60.230999999999995 L 121.35996490478516 60.230999999999995 L 129.35733032226562 60.230999999999995 L 129.35733032226562 60.230999999999995 L 129.35733032226562 60.230999999999995 L 129.35733032226562 60.230999999999995 L 129.35733032226562 60.230999999999995 L 121.35996490478516 60.230999999999995 Z"
                                                                            cy="0" cx="154.0334878540039" j="3"
                                                                            val="100" barHeight="62.73"
                                                                            barWidth="12.997365417480468"></path>
                                                                        <g class="apexcharts-bar-goals-markers">
                                                                            <g className="apexcharts-bar-goals-groups"
                                                                                class="apexcharts-hidden-element-shown"
                                                                                clip-path="url(#gridRectMarkerMask659ywi3l)">
                                                                            </g>
                                                                            <g className="apexcharts-bar-goals-groups"
                                                                                class="apexcharts-hidden-element-shown"
                                                                                clip-path="url(#gridRectMarkerMask659ywi3l)">
                                                                            </g>
                                                                            <g className="apexcharts-bar-goals-groups"
                                                                                class="apexcharts-hidden-element-shown"
                                                                                clip-path="url(#gridRectMarkerMask659ywi3l)">
                                                                            </g>
                                                                            <g className="apexcharts-bar-goals-groups"
                                                                                class="apexcharts-hidden-element-shown"
                                                                                clip-path="url(#gridRectMarkerMask659ywi3l)">
                                                                            </g>
                                                                        </g>
                                                                        <g
                                                                            class="apexcharts-bar-shadows apexcharts-hidden-element-shown">
                                                                        </g>
                                                                    </g>
                                                                    <g class="apexcharts-series" rel="2"
                                                                        seriesName="series-2" data:realIndex="1">
                                                                        <path
                                                                            d="M 21.336761474609375 57.230999999999995 L 21.336761474609375 29.965700000000002 C 21.336761474609375 28.465700000000002 22.836761474609375 26.965700000000002 24.336761474609375 26.965700000000002 L 26.33412689208984 26.965700000000002 C 27.83412689208984 26.965700000000002 29.33412689208984 28.465700000000002 29.33412689208984 29.965700000000002 L 29.33412689208984 57.230999999999995 C 29.33412689208984 58.730999999999995 27.83412689208984 60.230999999999995 26.33412689208984 60.230999999999995 L 24.336761474609375 60.230999999999995 C 22.836761474609375 60.230999999999995 21.336761474609375 58.730999999999995 21.336761474609375 57.230999999999995 Z "
                                                                            fill="var(--bs-success-bg-subtle)"
                                                                            fill-opacity="1" stroke="a"
                                                                            stroke-opacity="1" stroke-linecap="round"
                                                                            stroke-width="5" stroke-dasharray="0"
                                                                            class="apexcharts-bar-area undefined"
                                                                            index="1"
                                                                            clip-path="url(#gridRectBarMask659ywi3l)"
                                                                            pathTo="M 21.336761474609375 57.230999999999995 L 21.336761474609375 29.965700000000002 C 21.336761474609375 28.465700000000002 22.836761474609375 26.965700000000002 24.336761474609375 26.965700000000002 L 26.33412689208984 26.965700000000002 C 27.83412689208984 26.965700000000002 29.33412689208984 28.465700000000002 29.33412689208984 29.965700000000002 L 29.33412689208984 57.230999999999995 C 29.33412689208984 58.730999999999995 27.83412689208984 60.230999999999995 26.33412689208984 60.230999999999995 L 24.336761474609375 60.230999999999995 C 22.836761474609375 60.230999999999995 21.336761474609375 58.730999999999995 21.336761474609375 57.230999999999995 Z "
                                                                            pathFrom="M 21.336761474609375 60.230999999999995 L 21.336761474609375 60.230999999999995 L 29.33412689208984 60.230999999999995 L 29.33412689208984 60.230999999999995 L 29.33412689208984 60.230999999999995 L 29.33412689208984 60.230999999999995 L 29.33412689208984 60.230999999999995 L 21.336761474609375 60.230999999999995 Z"
                                                                            cy="24.4647" cx="54.010284423828125" j="0"
                                                                            val="61" barHeight="38.265299999999996"
                                                                            barWidth="12.997365417480468"></path>
                                                                        <path
                                                                            d="M 59.010284423828125 57.230999999999995 L 59.010284423828125 41.88439999999999 C 59.010284423828125 40.38439999999999 60.510284423828125 38.88439999999999 62.010284423828125 38.88439999999999 L 64.00764984130859 38.88439999999999 C 65.50764984130859 38.88439999999999 67.00764984130859 40.38439999999999 67.00764984130859 41.88439999999999 L 67.00764984130859 57.230999999999995 C 67.00764984130859 58.730999999999995 65.50764984130859 60.230999999999995 64.00764984130859 60.230999999999995 L 62.010284423828125 60.230999999999995 C 60.510284423828125 60.230999999999995 59.010284423828125 58.730999999999995 59.010284423828125 57.230999999999995 Z "
                                                                            fill="var(--bs-success-bg-subtle)"
                                                                            fill-opacity="1" stroke="a"
                                                                            stroke-opacity="1" stroke-linecap="round"
                                                                            stroke-width="5" stroke-dasharray="0"
                                                                            class="apexcharts-bar-area undefined"
                                                                            index="1"
                                                                            clip-path="url(#gridRectBarMask659ywi3l)"
                                                                            pathTo="M 59.010284423828125 57.230999999999995 L 59.010284423828125 41.88439999999999 C 59.010284423828125 40.38439999999999 60.510284423828125 38.88439999999999 62.010284423828125 38.88439999999999 L 64.00764984130859 38.88439999999999 C 65.50764984130859 38.88439999999999 67.00764984130859 40.38439999999999 67.00764984130859 41.88439999999999 L 67.00764984130859 57.230999999999995 C 67.00764984130859 58.730999999999995 65.50764984130859 60.230999999999995 64.00764984130859 60.230999999999995 L 62.010284423828125 60.230999999999995 C 60.510284423828125 60.230999999999995 59.010284423828125 58.730999999999995 59.010284423828125 57.230999999999995 Z "
                                                                            pathFrom="M 59.010284423828125 60.230999999999995 L 59.010284423828125 60.230999999999995 L 67.00764984130859 60.230999999999995 L 67.00764984130859 60.230999999999995 L 67.00764984130859 60.230999999999995 L 67.00764984130859 60.230999999999995 L 67.00764984130859 60.230999999999995 L 59.010284423828125 60.230999999999995 Z"
                                                                            cy="36.383399999999995"
                                                                            cx="91.68380737304688" j="1" val="42"
                                                                            barHeight="26.3466"
                                                                            barWidth="12.997365417480468"></path>
                                                                        <path
                                                                            d="M 96.68380737304688 57.230999999999995 L 96.68380737304688 21.810800000000004 C 96.68380737304688 20.310800000000004 98.18380737304688 18.810800000000004 99.68380737304688 18.810800000000004 L 101.68117279052734 18.810800000000004 C 103.18117279052734 18.810800000000004 104.68117279052734 20.310800000000004 104.68117279052734 21.810800000000004 L 104.68117279052734 57.230999999999995 C 104.68117279052734 58.730999999999995 103.18117279052734 60.230999999999995 101.68117279052734 60.230999999999995 L 99.68380737304688 60.230999999999995 C 98.18380737304688 60.230999999999995 96.68380737304688 58.730999999999995 96.68380737304688 57.230999999999995 Z "
                                                                            fill="var(--bs-success-bg-subtle)"
                                                                            fill-opacity="1" stroke="a"
                                                                            stroke-opacity="1" stroke-linecap="round"
                                                                            stroke-width="5" stroke-dasharray="0"
                                                                            class="apexcharts-bar-area undefined"
                                                                            index="1"
                                                                            clip-path="url(#gridRectBarMask659ywi3l)"
                                                                            pathTo="M 96.68380737304688 57.230999999999995 L 96.68380737304688 21.810800000000004 C 96.68380737304688 20.310800000000004 98.18380737304688 18.810800000000004 99.68380737304688 18.810800000000004 L 101.68117279052734 18.810800000000004 C 103.18117279052734 18.810800000000004 104.68117279052734 20.310800000000004 104.68117279052734 21.810800000000004 L 104.68117279052734 57.230999999999995 C 104.68117279052734 58.730999999999995 103.18117279052734 60.230999999999995 101.68117279052734 60.230999999999995 L 99.68380737304688 60.230999999999995 C 98.18380737304688 60.230999999999995 96.68380737304688 58.730999999999995 96.68380737304688 57.230999999999995 Z "
                                                                            pathFrom="M 96.68380737304688 60.230999999999995 L 96.68380737304688 60.230999999999995 L 104.68117279052734 60.230999999999995 L 104.68117279052734 60.230999999999995 L 104.68117279052734 60.230999999999995 L 104.68117279052734 60.230999999999995 L 104.68117279052734 60.230999999999995 L 96.68380737304688 60.230999999999995 Z"
                                                                            cy="16.309800000000003"
                                                                            cx="129.35733032226562" j="2" val="74"
                                                                            barHeight="46.420199999999994"
                                                                            barWidth="12.997365417480468"></path>
                                                                        <path
                                                                            d="M 134.35733032226562 57.230999999999995 L 134.35733032226562 23.0654 C 134.35733032226562 21.5654 135.85733032226562 20.0654 137.35733032226562 20.0654 L 139.3546957397461 20.0654 C 140.8546957397461 20.0654 142.3546957397461 21.5654 142.3546957397461 23.0654 L 142.3546957397461 57.230999999999995 C 142.3546957397461 58.730999999999995 140.8546957397461 60.230999999999995 139.3546957397461 60.230999999999995 L 137.35733032226562 60.230999999999995 C 135.85733032226562 60.230999999999995 134.35733032226562 58.730999999999995 134.35733032226562 57.230999999999995 Z "
                                                                            fill="var(--bs-success-bg-subtle)"
                                                                            fill-opacity="1" stroke="a"
                                                                            stroke-opacity="1" stroke-linecap="round"
                                                                            stroke-width="5" stroke-dasharray="0"
                                                                            class="apexcharts-bar-area undefined"
                                                                            index="1"
                                                                            clip-path="url(#gridRectBarMask659ywi3l)"
                                                                            pathTo="M 134.35733032226562 57.230999999999995 L 134.35733032226562 23.0654 C 134.35733032226562 21.5654 135.85733032226562 20.0654 137.35733032226562 20.0654 L 139.3546957397461 20.0654 C 140.8546957397461 20.0654 142.3546957397461 21.5654 142.3546957397461 23.0654 L 142.3546957397461 57.230999999999995 C 142.3546957397461 58.730999999999995 140.8546957397461 60.230999999999995 139.3546957397461 60.230999999999995 L 137.35733032226562 60.230999999999995 C 135.85733032226562 60.230999999999995 134.35733032226562 58.730999999999995 134.35733032226562 57.230999999999995 Z "
                                                                            pathFrom="M 134.35733032226562 60.230999999999995 L 134.35733032226562 60.230999999999995 L 142.3546957397461 60.230999999999995 L 142.3546957397461 60.230999999999995 L 142.3546957397461 60.230999999999995 L 142.3546957397461 60.230999999999995 L 142.3546957397461 60.230999999999995 L 134.35733032226562 60.230999999999995 Z"
                                                                            cy="17.5644" cx="167.03085327148438" j="3"
                                                                            val="72" barHeight="45.1656"
                                                                            barWidth="12.997365417480468"></path>
                                                                        <g class="apexcharts-bar-goals-markers">
                                                                            <g className="apexcharts-bar-goals-groups"
                                                                                class="apexcharts-hidden-element-shown"
                                                                                clip-path="url(#gridRectMarkerMask659ywi3l)">
                                                                            </g>
                                                                            <g className="apexcharts-bar-goals-groups"
                                                                                class="apexcharts-hidden-element-shown"
                                                                                clip-path="url(#gridRectMarkerMask659ywi3l)">
                                                                            </g>
                                                                            <g className="apexcharts-bar-goals-groups"
                                                                                class="apexcharts-hidden-element-shown"
                                                                                clip-path="url(#gridRectMarkerMask659ywi3l)">
                                                                            </g>
                                                                            <g className="apexcharts-bar-goals-groups"
                                                                                class="apexcharts-hidden-element-shown"
                                                                                clip-path="url(#gridRectMarkerMask659ywi3l)">
                                                                            </g>
                                                                        </g>
                                                                        <g
                                                                            class="apexcharts-bar-shadows apexcharts-hidden-element-shown">
                                                                        </g>
                                                                    </g>
                                                                    <g class="apexcharts-datalabels apexcharts-hidden-element-shown"
                                                                        data:realIndex="0"></g>
                                                                    <g class="apexcharts-datalabels apexcharts-hidden-element-shown"
                                                                        data:realIndex="1"></g>
                                                                </g>
                                                                <line x1="0" y1="0" x2="150.694091796875" y2="0"
                                                                    stroke="#b6b6b6" stroke-dasharray="0"
                                                                    stroke-width="1" stroke-linecap="butt"
                                                                    class="apexcharts-ycrosshairs"></line>
                                                                <line x1="0" y1="0" x2="150.694091796875" y2="0"
                                                                    stroke="#b6b6b6" stroke-dasharray="0"
                                                                    stroke-width="0" stroke-linecap="butt"
                                                                    class="apexcharts-ycrosshairs-hidden"></line>
                                                                <g class="apexcharts-xaxis" transform="translate(0, 0)">
                                                                    <g class="apexcharts-xaxis-texts-g"
                                                                        transform="translate(0, -4)"><text
                                                                            x="18.836761474609375" y="90.72999999999999"
                                                                            text-anchor="middle"
                                                                            dominant-baseline="auto" font-size="13px"
                                                                            font-family="Helvetica, Arial, sans-serif"
                                                                            font-weight="400"
                                                                            fill="var(--bs-secondary-color)"
                                                                            class="apexcharts-text apexcharts-xaxis-label "
                                                                            style="font-family: Helvetica, Arial, sans-serif;">
                                                                            <tspan>Jan</tspan>
                                                                            <title>Jan</title>
                                                                        </text><text x="56.510284423828125"
                                                                            y="90.72999999999999" text-anchor="middle"
                                                                            dominant-baseline="auto" font-size="13px"
                                                                            font-family="Helvetica, Arial, sans-serif"
                                                                            font-weight="400"
                                                                            fill="var(--bs-secondary-color)"
                                                                            class="apexcharts-text apexcharts-xaxis-label "
                                                                            style="font-family: Helvetica, Arial, sans-serif;">
                                                                            <tspan>Apr</tspan>
                                                                            <title>Apr</title>
                                                                        </text><text x="94.18380737304688"
                                                                            y="90.72999999999999" text-anchor="middle"
                                                                            dominant-baseline="auto" font-size="13px"
                                                                            font-family="Helvetica, Arial, sans-serif"
                                                                            font-weight="400"
                                                                            fill="var(--bs-secondary-color)"
                                                                            class="apexcharts-text apexcharts-xaxis-label "
                                                                            style="font-family: Helvetica, Arial, sans-serif;">
                                                                            <tspan>Jul</tspan>
                                                                            <title>Jul</title>
                                                                        </text><text x="131.85733032226562"
                                                                            y="90.72999999999999" text-anchor="middle"
                                                                            dominant-baseline="auto" font-size="13px"
                                                                            font-family="Helvetica, Arial, sans-serif"
                                                                            font-weight="400"
                                                                            fill="var(--bs-secondary-color)"
                                                                            class="apexcharts-text apexcharts-xaxis-label "
                                                                            style="font-family: Helvetica, Arial, sans-serif;">
                                                                            <tspan>Oct</tspan>
                                                                            <title>Oct</title>
                                                                        </text></g>
                                                                </g>
                                                                <g class="apexcharts-yaxis-annotations"></g>
                                                                <g class="apexcharts-xaxis-annotations"></g>
                                                                <g class="apexcharts-point-annotations"></g>
                                                            </g>
                                                        </svg>
                                                        <div class="apexcharts-tooltip apexcharts-theme-light">
                                                            <div class="apexcharts-tooltip-title"
                                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                            </div>
                                                            <div class="apexcharts-tooltip-series-group apexcharts-tooltip-series-group-0"
                                                                style="order: 1;"><span
                                                                    class="apexcharts-tooltip-marker"
                                                                    style="background-color: var(--bs-success);"></span>
                                                                <div class="apexcharts-tooltip-text"
                                                                    style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                                    <div class="apexcharts-tooltip-y-group"><span
                                                                            class="apexcharts-tooltip-text-y-label"></span><span
                                                                            class="apexcharts-tooltip-text-y-value"></span>
                                                                    </div>
                                                                    <div class="apexcharts-tooltip-goals-group"><span
                                                                            class="apexcharts-tooltip-text-goals-label"></span><span
                                                                            class="apexcharts-tooltip-text-goals-value"></span>
                                                                    </div>
                                                                    <div class="apexcharts-tooltip-z-group"><span
                                                                            class="apexcharts-tooltip-text-z-label"></span><span
                                                                            class="apexcharts-tooltip-text-z-value"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="apexcharts-tooltip-series-group apexcharts-tooltip-series-group-1"
                                                                style="order: 2;"><span
                                                                    class="apexcharts-tooltip-marker"
                                                                    style="background-color: var(--bs-success-bg-subtle);"></span>
                                                                <div class="apexcharts-tooltip-text"
                                                                    style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                                    <div class="apexcharts-tooltip-y-group"><span
                                                                            class="apexcharts-tooltip-text-y-label"></span><span
                                                                            class="apexcharts-tooltip-text-y-value"></span>
                                                                    </div>
                                                                    <div class="apexcharts-tooltip-goals-group"><span
                                                                            class="apexcharts-tooltip-text-goals-label"></span><span
                                                                            class="apexcharts-tooltip-text-goals-value"></span>
                                                                    </div>
                                                                    <div class="apexcharts-tooltip-z-group"><span
                                                                            class="apexcharts-tooltip-text-z-label"></span><span
                                                                            class="apexcharts-tooltip-text-z-value"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                                            <div class="apexcharts-yaxistooltip-text"></div>
                                                        </div>
                                                        <div class="apexcharts-toolbar" style="top: 0px; right: 3px;">
                                                            <div class="apexcharts-menu">
                                                                <div class="apexcharts-menu-item exportSVG"
                                                                    title="Download SVG">Download SVG</div>
                                                                <div class="apexcharts-menu-item exportPNG"
                                                                    title="Download PNG">Download PNG</div>
                                                                <div class="apexcharts-menu-item exportCSV"
                                                                    title="Download CSV">Download CSV</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xxl-6 col-md-3 col-sm-6 col-12 mb-6">
                                        <div class="card h-100">
                                            <div class="card-body pb-0">
                                                <span class="d-block fw-medium mb-1">Expenses</span>
                                            </div>
                                            <div id="expensesChart" class="mb-2" style="min-height: 69px;">
                                                <div id="apexchartshkxvsut9"
                                                    class="apexcharts-canvas apexchartshkxvsut9 apexcharts-theme-"
                                                    style="width: 210px; height: 69px;"><svg
                                                        xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        class="apexcharts-svg" xmlns:data="ApexChartsNS"
                                                        transform="translate(0, 0)" width="210" height="69">
                                                        <foreignObject x="0" y="0" width="210" height="69">
                                                            <div class="apexcharts-legend"
                                                                xmlns="http://www.w3.org/1999/xhtml"></div>
                                                            <style type="text/css">
                                                                .apexcharts-flip-y {
                                                                    transform: scaleY(-1) translateY(-100%);
                                                                    transform-origin: top;
                                                                    transform-box: fill-box;
                                                                }

                                                                .apexcharts-flip-x {
                                                                    transform: scaleX(-1);
                                                                    transform-origin: center;
                                                                    transform-box: fill-box;
                                                                }

                                                                .apexcharts-legend {
                                                                    display: flex;
                                                                    overflow: auto;
                                                                    padding: 0 10px;
                                                                }

                                                                .apexcharts-legend.apexcharts-legend-group-horizontal {
                                                                    flex-direction: column;
                                                                }

                                                                .apexcharts-legend-group {
                                                                    display: flex;
                                                                }

                                                                .apexcharts-legend-group-vertical {
                                                                    flex-direction: column-reverse;
                                                                }

                                                                .apexcharts-legend.apx-legend-position-bottom,
                                                                .apexcharts-legend.apx-legend-position-top {
                                                                    flex-wrap: wrap
                                                                }

                                                                .apexcharts-legend.apx-legend-position-right,
                                                                .apexcharts-legend.apx-legend-position-left {
                                                                    flex-direction: column;
                                                                    bottom: 0;
                                                                }

                                                                .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-left,
                                                                .apexcharts-legend.apx-legend-position-top.apexcharts-align-left,
                                                                .apexcharts-legend.apx-legend-position-right,
                                                                .apexcharts-legend.apx-legend-position-left {
                                                                    justify-content: flex-start;
                                                                    align-items: flex-start;
                                                                }

                                                                .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-center,
                                                                .apexcharts-legend.apx-legend-position-top.apexcharts-align-center {
                                                                    justify-content: center;
                                                                    align-items: center;
                                                                }

                                                                .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-right,
                                                                .apexcharts-legend.apx-legend-position-top.apexcharts-align-right {
                                                                    justify-content: flex-end;
                                                                    align-items: flex-end;
                                                                }

                                                                .apexcharts-legend-series {
                                                                    cursor: pointer;
                                                                    line-height: normal;
                                                                    display: flex;
                                                                    align-items: center;
                                                                }

                                                                .apexcharts-legend-text {
                                                                    position: relative;
                                                                    font-size: 14px;
                                                                }

                                                                .apexcharts-legend-text *,
                                                                .apexcharts-legend-marker * {
                                                                    pointer-events: none;
                                                                }

                                                                .apexcharts-legend-marker {
                                                                    position: relative;
                                                                    display: flex;
                                                                    align-items: center;
                                                                    justify-content: center;
                                                                    cursor: pointer;
                                                                    margin-right: 1px;
                                                                }

                                                                .apexcharts-legend-series.apexcharts-no-click {
                                                                    cursor: auto;
                                                                }

                                                                .apexcharts-legend .apexcharts-hidden-zero-series,
                                                                .apexcharts-legend .apexcharts-hidden-null-series {
                                                                    display: none !important;
                                                                }

                                                                .apexcharts-inactive-legend {
                                                                    opacity: 0.45;
                                                                }
                                                            </style>
                                                        </foreignObject>
                                                        <g class="apexcharts-inner apexcharts-graphical"
                                                            transform="translate(30, 1)">
                                                            <defs>
                                                                <clipPath id="gridRectMaskhkxvsut9">
                                                                    <rect width="150" height="124" x="0" y="0" rx="0"
                                                                        ry="0" opacity="1" stroke-width="0"
                                                                        stroke="none" stroke-dasharray="0" fill="#fff">
                                                                    </rect>
                                                                </clipPath>
                                                                <clipPath id="gridRectBarMaskhkxvsut9">
                                                                    <rect width="156" height="130" x="-3" y="-3" rx="0"
                                                                        ry="0" opacity="1" stroke-width="0"
                                                                        stroke="none" stroke-dasharray="0" fill="#fff">
                                                                    </rect>
                                                                </clipPath>
                                                                <clipPath id="gridRectMarkerMaskhkxvsut9">
                                                                    <rect width="150" height="124" x="0" y="0" rx="0"
                                                                        ry="0" opacity="1" stroke-width="0"
                                                                        stroke="none" stroke-dasharray="0" fill="#fff">
                                                                    </rect>
                                                                </clipPath>
                                                                <clipPath id="forecastMaskhkxvsut9"></clipPath>
                                                                <clipPath id="nonForecastMaskhkxvsut9"></clipPath>
                                                            </defs>
                                                            <g class="apexcharts-radialbar">
                                                                <g>
                                                                    <g class="apexcharts-tracks">
                                                                        <g class="apexcharts-radialbar-track apexcharts-track"
                                                                            rel="1">
                                                                            <path
                                                                                d="M 32.42682926829268 61.99999999999999 A 42.57317073170732 42.57317073170732 0 0 1 117.57317073170732 62 "
                                                                                fill="none" fill-opacity="1"
                                                                                stroke="var(--bs-secondary-bg-subtle)"
                                                                                stroke-opacity="1"
                                                                                stroke-linecap="round"
                                                                                stroke-width="8.351463414634146"
                                                                                stroke-dasharray="0"
                                                                                class="apexcharts-radialbar-area"
                                                                                id="apexcharts-radialbarTrack-0"
                                                                                data:pathOrig="M 32.42682926829268 61.99999999999999 A 42.57317073170732 42.57317073170732 0 0 1 117.57317073170732 62 ">
                                                                            </path>
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g class="apexcharts-series apexcharts-radial-series"
                                                                            seriesName="Progress" rel="1"
                                                                            data:realIndex="0">
                                                                            <path
                                                                                d="M 32.42682926829268 61.99999999999999 A 42.57317073170732 42.57317073170732 0 0 1 107.61294086497992 34.63449334858892 "
                                                                                fill="none" fill-opacity="0.85"
                                                                                stroke="var(--bs-primary)"
                                                                                stroke-opacity="1"
                                                                                stroke-linecap="round"
                                                                                stroke-width="8.609756097560975"
                                                                                stroke-dasharray="0"
                                                                                class="apexcharts-radialbar-area apexcharts-radialbar-slice-0"
                                                                                data:angle="140" data:value="78"
                                                                                index="0" j="0"
                                                                                data:pathOrig="M 32.42682926829268 61.99999999999999 A 42.57317073170732 42.57317073170732 0 0 1 107.61294086497992 34.63449334858892 ">
                                                                            </path>
                                                                        </g>
                                                                        <circle r="33.39743902439025" cx="75" cy="62"
                                                                            class="apexcharts-radialbar-hollow"
                                                                            fill="transparent"></circle>
                                                                        <g class="apexcharts-datalabels-group"
                                                                            transform="translate(0, 0) scale(1)"
                                                                            style="opacity: 1;"><text x="75" y="57"
                                                                                text-anchor="middle"
                                                                                dominant-baseline="auto"
                                                                                font-size="18px"
                                                                                font-family="var(--bs-font-family-base)"
                                                                                font-weight="500"
                                                                                fill="var(--bs-heading-color)"
                                                                                class="apexcharts-text apexcharts-datalabel-value"
                                                                                style="font-family: var(--bs-font-family-base);">78%</text>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                            <line x1="0" y1="0" x2="150" y2="0" stroke="#b6b6b6"
                                                                stroke-dasharray="0" stroke-width="1"
                                                                stroke-linecap="butt" class="apexcharts-ycrosshairs">
                                                            </line>
                                                            <line x1="0" y1="0" x2="150" y2="0" stroke="#b6b6b6"
                                                                stroke-dasharray="0" stroke-width="0"
                                                                stroke-linecap="butt"
                                                                class="apexcharts-ycrosshairs-hidden"></line>
                                                        </g>
                                                        <g class="apexcharts-datalabels-group"
                                                            transform="translate(0, 0) scale(1)"></g>
                                                    </svg></div>
                                            </div>
                                            <div class="p-4 pt-2">
                                                <small class="d-block text-center">$21k Expenses more than last
                                                    month</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xxl-6 col-md-3 col-sm-6 col-12 mb-6">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <div
                                                    class="card-title d-flex align-items-start justify-content-between mb-4">
                                                    <div class="avatar flex-shrink-0">
                                                        <img src="./components/img/cc-primary.png"
                                                            alt="Credit Card" class="rounded">
                                                    </div>
                                                    <div class="dropdown">
                                                        <button class="btn p-0" type="button" id="cardOpt1"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i
                                                                class="icon-base bx bx-dots-vertical-rounded text-body-secondary"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                                            <a class="dropdown-item" href="javascript:void(0);">View
                                                                More</a>
                                                            <a class="dropdown-item"
                                                                href="javascript:void(0);">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="mb-1">Transactions</p>
                                                <h4 class="card-title mb-3">$14,857</h4>
                                                <small class="text-success fw-medium"><i
                                                        class="icon-base bx bx-up-arrow-alt"></i> +28.14%</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Total Income -->
                            <div class="col-md-12 col-xxl-8 mb-6">
                                <div class="card h-100">
                                    <div class="row row-bordered g-0">
                                        <div class="col-md-8">
                                            <div class="card-header d-flex justify-content-between">
                                                <div>
                                                    <h5 class="card-title mb-1">Total Income</h5>
                                                    <p class="card-subtitle">Yearly report overview</p>
                                                </div>
                                                <div class="dropdown">
                                                    <button class="btn p-0" type="button" id="totalIncome"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i
                                                            class="icon-base bx bx-dots-vertical-rounded icon-lg text-body-secondary"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end"
                                                        aria-labelledby="totalIncome">
                                                        <a class="dropdown-item" href="javascript:void(0);">Last 28
                                                            Days</a>
                                                        <a class="dropdown-item" href="javascript:void(0);">Last
                                                            Month</a>
                                                        <a class="dropdown-item" href="javascript:void(0);">Last
                                                            Year</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div id="totalIncomeChart" style="min-height: 305px;">
                                                    <div id="apexcharts7h7z7a5x"
                                                        class="apexcharts-canvas apexcharts7h7z7a5x apexcharts-theme-"
                                                        style="width: 563px; height: 290px;"><svg
                                                            xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            class="apexcharts-svg apexcharts-zoomable"
                                                            xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                            width="563" height="290">
                                                            <foreignObject x="0" y="0" width="563" height="290">
                                                                <div class="apexcharts-legend"
                                                                    xmlns="http://www.w3.org/1999/xhtml"
                                                                    style="max-height: 145px;"></div>
                                                                <style type="text/css">
                                                                    .apexcharts-flip-y {
                                                                        transform: scaleY(-1) translateY(-100%);
                                                                        transform-origin: top;
                                                                        transform-box: fill-box;
                                                                    }

                                                                    .apexcharts-flip-x {
                                                                        transform: scaleX(-1);
                                                                        transform-origin: center;
                                                                        transform-box: fill-box;
                                                                    }

                                                                    .apexcharts-legend {
                                                                        display: flex;
                                                                        overflow: auto;
                                                                        padding: 0 10px;
                                                                    }

                                                                    .apexcharts-legend.apexcharts-legend-group-horizontal {
                                                                        flex-direction: column;
                                                                    }

                                                                    .apexcharts-legend-group {
                                                                        display: flex;
                                                                    }

                                                                    .apexcharts-legend-group-vertical {
                                                                        flex-direction: column-reverse;
                                                                    }

                                                                    .apexcharts-legend.apx-legend-position-bottom,
                                                                    .apexcharts-legend.apx-legend-position-top {
                                                                        flex-wrap: wrap
                                                                    }

                                                                    .apexcharts-legend.apx-legend-position-right,
                                                                    .apexcharts-legend.apx-legend-position-left {
                                                                        flex-direction: column;
                                                                        bottom: 0;
                                                                    }

                                                                    .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-left,
                                                                    .apexcharts-legend.apx-legend-position-top.apexcharts-align-left,
                                                                    .apexcharts-legend.apx-legend-position-right,
                                                                    .apexcharts-legend.apx-legend-position-left {
                                                                        justify-content: flex-start;
                                                                        align-items: flex-start;
                                                                    }

                                                                    .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-center,
                                                                    .apexcharts-legend.apx-legend-position-top.apexcharts-align-center {
                                                                        justify-content: center;
                                                                        align-items: center;
                                                                    }

                                                                    .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-right,
                                                                    .apexcharts-legend.apx-legend-position-top.apexcharts-align-right {
                                                                        justify-content: flex-end;
                                                                        align-items: flex-end;
                                                                    }

                                                                    .apexcharts-legend-series {
                                                                        cursor: pointer;
                                                                        line-height: normal;
                                                                        display: flex;
                                                                        align-items: center;
                                                                    }

                                                                    .apexcharts-legend-text {
                                                                        position: relative;
                                                                        font-size: 14px;
                                                                    }

                                                                    .apexcharts-legend-text *,
                                                                    .apexcharts-legend-marker * {
                                                                        pointer-events: none;
                                                                    }

                                                                    .apexcharts-legend-marker {
                                                                        position: relative;
                                                                        display: flex;
                                                                        align-items: center;
                                                                        justify-content: center;
                                                                        cursor: pointer;
                                                                        margin-right: 1px;
                                                                    }

                                                                    .apexcharts-legend-series.apexcharts-no-click {
                                                                        cursor: auto;
                                                                    }

                                                                    .apexcharts-legend .apexcharts-hidden-zero-series,
                                                                    .apexcharts-legend .apexcharts-hidden-null-series {
                                                                        display: none !important;
                                                                    }

                                                                    .apexcharts-inactive-legend {
                                                                        opacity: 0.45;
                                                                    }
                                                                </style>
                                                            </foreignObject>
                                                            <rect width="0" height="0" x="0" y="0" rx="0" ry="0"
                                                                opacity="1" stroke-width="0" stroke="none"
                                                                stroke-dasharray="0" fill="#fefefe"></rect>
                                                            <g class="apexcharts-datalabels-group"
                                                                transform="translate(0, 0) scale(1)"></g>
                                                            <g class="apexcharts-datalabels-group"
                                                                transform="translate(0, 0) scale(1)"></g>
                                                            <g class="apexcharts-yaxis" rel="0"
                                                                transform="translate(6.6529541015625, 0)">
                                                                <g class="apexcharts-yaxis-texts-g"><text x="20"
                                                                        y="19.333333333333332" text-anchor="end"
                                                                        dominant-baseline="auto" font-size="13px"
                                                                        font-family="var(--bs-font-family-base)"
                                                                        font-weight="400"
                                                                        fill="var(--bs-secondary-color)"
                                                                        class="apexcharts-text apexcharts-yaxis-label "
                                                                        style="font-family: var(--bs-font-family-base);">
                                                                        <tspan>$6k</tspan>
                                                                        <title>$6k</title>
                                                                    </text><text x="20" y="68.47933333333333"
                                                                        text-anchor="end" dominant-baseline="auto"
                                                                        font-size="13px"
                                                                        font-family="var(--bs-font-family-base)"
                                                                        font-weight="400"
                                                                        fill="var(--bs-secondary-color)"
                                                                        class="apexcharts-text apexcharts-yaxis-label "
                                                                        style="font-family: var(--bs-font-family-base);">
                                                                        <tspan>$5k</tspan>
                                                                        <title>$5k</title>
                                                                    </text><text x="20" y="117.62533333333333"
                                                                        text-anchor="end" dominant-baseline="auto"
                                                                        font-size="13px"
                                                                        font-family="var(--bs-font-family-base)"
                                                                        font-weight="400"
                                                                        fill="var(--bs-secondary-color)"
                                                                        class="apexcharts-text apexcharts-yaxis-label "
                                                                        style="font-family: var(--bs-font-family-base);">
                                                                        <tspan>$4k</tspan>
                                                                        <title>$4k</title>
                                                                    </text><text x="20" y="166.77133333333333"
                                                                        text-anchor="end" dominant-baseline="auto"
                                                                        font-size="13px"
                                                                        font-family="var(--bs-font-family-base)"
                                                                        font-weight="400"
                                                                        fill="var(--bs-secondary-color)"
                                                                        class="apexcharts-text apexcharts-yaxis-label "
                                                                        style="font-family: var(--bs-font-family-base);">
                                                                        <tspan>$3k</tspan>
                                                                        <title>$3k</title>
                                                                    </text><text x="20" y="215.91733333333332"
                                                                        text-anchor="end" dominant-baseline="auto"
                                                                        font-size="13px"
                                                                        font-family="var(--bs-font-family-base)"
                                                                        font-weight="400"
                                                                        fill="var(--bs-secondary-color)"
                                                                        class="apexcharts-text apexcharts-yaxis-label "
                                                                        style="font-family: var(--bs-font-family-base);">
                                                                        <tspan>$2k</tspan>
                                                                        <title>$2k</title>
                                                                    </text><text x="20" y="265.06333333333333"
                                                                        text-anchor="end" dominant-baseline="auto"
                                                                        font-size="13px"
                                                                        font-family="var(--bs-font-family-base)"
                                                                        font-weight="400"
                                                                        fill="var(--bs-secondary-color)"
                                                                        class="apexcharts-text apexcharts-yaxis-label "
                                                                        style="font-family: var(--bs-font-family-base);">
                                                                        <tspan>$1k</tspan>
                                                                        <title>$1k</title>
                                                                    </text></g>
                                                            </g>
                                                            <g class="apexcharts-inner apexcharts-graphical"
                                                                transform="translate(39.6529541015625, 15)">
                                                                <defs>
                                                                    <clipPath id="gridRectMask7h7z7a5x">
                                                                        <rect width="510.5379638671875" height="245.73"
                                                                            x="0" y="0" rx="0" ry="0" opacity="1"
                                                                            stroke-width="0" stroke="none"
                                                                            stroke-dasharray="0" fill="#fff"></rect>
                                                                    </clipPath>
                                                                    <clipPath id="gridRectBarMask7h7z7a5x">
                                                                        <rect width="517.5379638671875" height="252.73"
                                                                            x="-3.5" y="-3.5" rx="0" ry="0" opacity="1"
                                                                            stroke-width="0" stroke="none"
                                                                            stroke-dasharray="0" fill="#fff"></rect>
                                                                    </clipPath>
                                                                    <clipPath id="gridRectMarkerMask7h7z7a5x">
                                                                        <rect width="510.5379638671875" height="245.73"
                                                                            x="0" y="0" rx="0" ry="0" opacity="1"
                                                                            stroke-width="0" stroke="none"
                                                                            stroke-dasharray="0" fill="#fff"></rect>
                                                                    </clipPath>
                                                                    <clipPath id="forecastMask7h7z7a5x"></clipPath>
                                                                    <clipPath id="nonForecastMask7h7z7a5x"></clipPath>
                                                                    <linearGradient x1="0" y1="0" x2="0" y2="1"
                                                                        id="SvgjsLinearGradient1109">
                                                                        <stop stop-opacity="0.3"
                                                                            stop-color="var(--bs-primary)" offset="0">
                                                                        </stop>
                                                                        <stop stop-opacity="0.3"
                                                                            stop-color="var(--bs-paper-bg)" offset="1">
                                                                        </stop>
                                                                        <stop stop-opacity="0.3"
                                                                            stop-color="var(--bs-paper-bg)" offset="1">
                                                                        </stop>
                                                                    </linearGradient>
                                                                    <filter id="SvgjsFilter1117"
                                                                        filterUnits="userSpaceOnUse" width="200%"
                                                                        height="200%" x="-50%" y="-50%">
                                                                        <feOffset id="SvgjsFeOffset1110" result="offset"
                                                                            in="SourceGraphic" dx="2" dy="14">
                                                                        </feOffset>
                                                                        <feGaussianBlur id="SvgjsFeGaussianBlur1111"
                                                                            result="blur" in="offset" stdDeviation="3">
                                                                        </feGaussianBlur>
                                                                        <feFlood id="SvgjsFeFlood1112" result="flood"
                                                                            in="SourceGraphic"
                                                                            flood-color="var(--bs-primary)"
                                                                            flood-opacity="0.15"></feFlood>
                                                                        <feComposite id="SvgjsFeComposite1113"
                                                                            result="shadow" in="flood" in2="blur"
                                                                            operator="in"></feComposite>
                                                                        <feMerge id="SvgjsFeMerge1114"
                                                                            result="SvgjsFeMerge1114"
                                                                            in="SourceGraphic">
                                                                            <feMergeNode id="SvgjsFeMergeNode1115"
                                                                                result="SvgjsFeMergeNode1115"
                                                                                in="shadow"></feMergeNode>
                                                                            <feMergeNode id="SvgjsFeMergeNode1116"
                                                                                result="SvgjsFeMergeNode1116"
                                                                                in="SourceGraphic"></feMergeNode>
                                                                        </feMerge>
                                                                    </filter>
                                                                    <filter id="SvgjsFilter1125"
                                                                        filterUnits="userSpaceOnUse" width="200%"
                                                                        height="200%" x="-50%" y="-50%">
                                                                        <feOffset id="SvgjsFeOffset1118" result="offset"
                                                                            in="SourceGraphic" dx="2" dy="14">
                                                                        </feOffset>
                                                                        <feGaussianBlur id="SvgjsFeGaussianBlur1119"
                                                                            result="blur" in="offset" stdDeviation="3">
                                                                        </feGaussianBlur>
                                                                        <feFlood id="SvgjsFeFlood1120" result="flood"
                                                                            in="SourceGraphic"
                                                                            flood-color="var(--bs-primary)"
                                                                            flood-opacity="0.15"></feFlood>
                                                                        <feComposite id="SvgjsFeComposite1121"
                                                                            result="shadow" in="flood" in2="blur"
                                                                            operator="in"></feComposite>
                                                                        <feMerge id="SvgjsFeMerge1122"
                                                                            result="SvgjsFeMerge1122"
                                                                            in="SourceGraphic">
                                                                            <feMergeNode id="SvgjsFeMergeNode1123"
                                                                                result="SvgjsFeMergeNode1123"
                                                                                in="shadow"></feMergeNode>
                                                                            <feMergeNode id="SvgjsFeMergeNode1124"
                                                                                result="SvgjsFeMergeNode1124"
                                                                                in="SourceGraphic"></feMergeNode>
                                                                        </feMerge>
                                                                    </filter>
                                                                </defs>
                                                                <line x1="0" y1="0" x2="0" y2="245.73" stroke="#b6b6b6"
                                                                    stroke-dasharray="3" stroke-linecap="butt"
                                                                    class="apexcharts-xcrosshairs" x="0" y="0" width="1"
                                                                    height="245.73" fill="#b1b9c4" filter="none"
                                                                    fill-opacity="0.9" stroke-width="1"></line>
                                                                <g class="apexcharts-grid">
                                                                    <g class="apexcharts-gridlines-horizontal">
                                                                        <line x1="0" y1="49.146" x2="510.5379638671875"
                                                                            y2="49.146" stroke="var(--bs-border-color)"
                                                                            stroke-dasharray="10" stroke-linecap="butt"
                                                                            class="apexcharts-gridline"></line>
                                                                        <line x1="0" y1="98.292" x2="510.5379638671875"
                                                                            y2="98.292" stroke="var(--bs-border-color)"
                                                                            stroke-dasharray="10" stroke-linecap="butt"
                                                                            class="apexcharts-gridline"></line>
                                                                        <line x1="0" y1="147.438" x2="510.5379638671875"
                                                                            y2="147.438" stroke="var(--bs-border-color)"
                                                                            stroke-dasharray="10" stroke-linecap="butt"
                                                                            class="apexcharts-gridline"></line>
                                                                        <line x1="0" y1="196.584" x2="510.5379638671875"
                                                                            y2="196.584" stroke="var(--bs-border-color)"
                                                                            stroke-dasharray="10" stroke-linecap="butt"
                                                                            class="apexcharts-gridline"></line>
                                                                        <line x1="0" y1="245.73000000000002"
                                                                            x2="510.5379638671875"
                                                                            y2="245.73000000000002"
                                                                            stroke="var(--bs-border-color)"
                                                                            stroke-dasharray="10" stroke-linecap="butt"
                                                                            class="apexcharts-gridline"></line>
                                                                    </g>
                                                                    <g class="apexcharts-gridlines-vertical"></g>
                                                                    <line x1="0" y1="245.73" x2="510.5379638671875"
                                                                        y2="245.73" stroke="transparent"
                                                                        stroke-dasharray="0" stroke-linecap="butt">
                                                                    </line>
                                                                    <line x1="0" y1="1" x2="0" y2="245.73"
                                                                        stroke="transparent" stroke-dasharray="0"
                                                                        stroke-linecap="butt"></line>
                                                                </g>
                                                                <g class="apexcharts-grid-borders">
                                                                    <line x1="0" y1="0" x2="510.5379638671875" y2="0"
                                                                        stroke="var(--bs-border-color)"
                                                                        stroke-dasharray="10" stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                </g>
                                                                <g
                                                                    class="apexcharts-area-series apexcharts-plot-series">
                                                                    <g class="apexcharts-series" zIndex="0"
                                                                        seriesName="series-1" data:longestSeries="true"
                                                                        rel="1" data:realIndex="0">
                                                                        <path
                                                                            d="M 0 130.2369 L 46.41254216974431 130.2369 L 92.82508433948863 58.9752 L 139.23762650923294 58.9752 L 185.65016867897725 149.8953 L 232.06271084872157 149.8953 L 278.4752530184659 206.4132 L 324.8877951882102 206.4132 L 371.3003373579545 110.57849999999999 L 417.7128795276988 110.57849999999999 L 464.12542169744313 14.743800000000022 L 510.53796386718744 14.743800000000022 L 510.53796386718744 245.73 L 0 245.73z"
                                                                            fill="url(#SvgjsLinearGradient1109)"
                                                                            fill-opacity="1" stroke="none"
                                                                            stroke-opacity="1" stroke-linecap="butt"
                                                                            stroke-width="0" stroke-dasharray="0"
                                                                            class="apexcharts-area" index="0"
                                                                            clip-path="url(#gridRectMask7h7z7a5x)"
                                                                            filter="url(#SvgjsFilter1117)"
                                                                            pathTo="M 0 130.2369 L 46.41254216974431 130.2369 L 92.82508433948863 58.9752 L 139.23762650923294 58.9752 L 185.65016867897725 149.8953 L 232.06271084872157 149.8953 L 278.4752530184659 206.4132 L 324.8877951882102 206.4132 L 371.3003373579545 110.57849999999999 L 417.7128795276988 110.57849999999999 L 464.12542169744313 14.743800000000022 L 510.53796386718744 14.743800000000022 L 510.53796386718744 245.73 L 0 245.73z"
                                                                            pathFrom="M 0 245.73 L 0 245.73 L 46.41254216974431 245.73 L 92.82508433948863 245.73 L 139.23762650923294 245.73 L 185.65016867897725 245.73 L 232.06271084872157 245.73 L 278.4752530184659 245.73 L 324.8877951882102 245.73 L 371.3003373579545 245.73 L 417.7128795276988 245.73 L 464.12542169744313 245.73 L 510.53796386718744 245.73z">
                                                                        </path>
                                                                        <path
                                                                            d="M 0 130.2369 L 46.41254216974431 130.2369 L 92.82508433948863 58.9752 L 139.23762650923294 58.9752 L 185.65016867897725 149.8953 L 232.06271084872157 149.8953 L 278.4752530184659 206.4132 L 324.8877951882102 206.4132 L 371.3003373579545 110.57849999999999 L 417.7128795276988 110.57849999999999 L 464.12542169744313 14.743800000000022 L 510.53796386718744 14.743800000000022"
                                                                            fill="none" fill-opacity="1"
                                                                            stroke="var(--bs-primary)"
                                                                            stroke-opacity="1" stroke-linecap="butt"
                                                                            stroke-width="3" stroke-dasharray="0"
                                                                            class="apexcharts-area" index="0"
                                                                            clip-path="url(#gridRectMask7h7z7a5x)"
                                                                            filter="url(#SvgjsFilter1125)"
                                                                            pathTo="M 0 130.2369 L 46.41254216974431 130.2369 L 92.82508433948863 58.9752 L 139.23762650923294 58.9752 L 185.65016867897725 149.8953 L 232.06271084872157 149.8953 L 278.4752530184659 206.4132 L 324.8877951882102 206.4132 L 371.3003373579545 110.57849999999999 L 417.7128795276988 110.57849999999999 L 464.12542169744313 14.743800000000022 L 510.53796386718744 14.743800000000022"
                                                                            pathFrom="M 0 245.73 L 0 245.73 L 46.41254216974431 245.73 L 92.82508433948863 245.73 L 139.23762650923294 245.73 L 185.65016867897725 245.73 L 232.06271084872157 245.73 L 278.4752530184659 245.73 L 324.8877951882102 245.73 L 371.3003373579545 245.73 L 417.7128795276988 245.73 L 464.12542169744313 245.73 L 510.53796386718744 245.73"
                                                                            fill-rule="evenodd"></path>
                                                                        <g class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown"
                                                                            data:realIndex="0">
                                                                            <g class="apexcharts-series-markers">
                                                                                <path d="M 0, 0 
           m -0, 0 
           a 0,0 0 1,0 0,0 
           a 0,0 0 1,0 -0,0" fill="var(--bs-primary)" fill-opacity="1" stroke="#ffffff" stroke-opacity="0.9"
                                                                                    stroke-linecap="butt"
                                                                                    stroke-width="2"
                                                                                    stroke-dasharray="0" cx="0" cy="0"
                                                                                    shape="circle"
                                                                                    class="apexcharts-marker wv74n7yisl no-pointer-events"
                                                                                    default-marker-size="0"></path>
                                                                            </g>
                                                                        </g>
                                                                    </g>
                                                                    <g class="apexcharts-datalabels" data:realIndex="0">
                                                                    </g>
                                                                </g>
                                                                <line x1="0" y1="0" x2="510.5379638671875" y2="0"
                                                                    stroke="#b6b6b6" stroke-dasharray="0"
                                                                    stroke-width="1" stroke-linecap="butt"
                                                                    class="apexcharts-ycrosshairs"></line>
                                                                <line x1="0" y1="0" x2="510.5379638671875" y2="0"
                                                                    stroke="#b6b6b6" stroke-dasharray="0"
                                                                    stroke-width="0" stroke-linecap="butt"
                                                                    class="apexcharts-ycrosshairs-hidden"></line>
                                                                <g class="apexcharts-xaxis" transform="translate(0, 0)">
                                                                    <g class="apexcharts-xaxis-texts-g"
                                                                        transform="translate(0, -4)"><text x="0"
                                                                            y="273.73" text-anchor="middle"
                                                                            dominant-baseline="auto" font-size="13px"
                                                                            font-family="var(--bs-font-family-base)"
                                                                            font-weight="400"
                                                                            fill="var(--bs-secondary-color)"
                                                                            class="apexcharts-text apexcharts-xaxis-label "
                                                                            style="font-family: var(--bs-font-family-base);">
                                                                            <tspan>Jan</tspan>
                                                                            <title>Jan</title>
                                                                        </text><text x="46.41254216974433" y="273.73"
                                                                            text-anchor="middle"
                                                                            dominant-baseline="auto" font-size="13px"
                                                                            font-family="var(--bs-font-family-base)"
                                                                            font-weight="400"
                                                                            fill="var(--bs-secondary-color)"
                                                                            class="apexcharts-text apexcharts-xaxis-label "
                                                                            style="font-family: var(--bs-font-family-base);">
                                                                            <tspan>Feb</tspan>
                                                                            <title>Feb</title>
                                                                        </text><text x="92.82508433948865" y="273.73"
                                                                            text-anchor="middle"
                                                                            dominant-baseline="auto" font-size="13px"
                                                                            font-family="var(--bs-font-family-base)"
                                                                            font-weight="400"
                                                                            fill="var(--bs-secondary-color)"
                                                                            class="apexcharts-text apexcharts-xaxis-label "
                                                                            style="font-family: var(--bs-font-family-base);">
                                                                            <tspan>Mar</tspan>
                                                                            <title>Mar</title>
                                                                        </text><text x="139.23762650923297" y="273.73"
                                                                            text-anchor="middle"
                                                                            dominant-baseline="auto" font-size="13px"
                                                                            font-family="var(--bs-font-family-base)"
                                                                            font-weight="400"
                                                                            fill="var(--bs-secondary-color)"
                                                                            class="apexcharts-text apexcharts-xaxis-label "
                                                                            style="font-family: var(--bs-font-family-base);">
                                                                            <tspan>Apr</tspan>
                                                                            <title>Apr</title>
                                                                        </text><text x="185.65016867897728" y="273.73"
                                                                            text-anchor="middle"
                                                                            dominant-baseline="auto" font-size="13px"
                                                                            font-family="var(--bs-font-family-base)"
                                                                            font-weight="400"
                                                                            fill="var(--bs-secondary-color)"
                                                                            class="apexcharts-text apexcharts-xaxis-label "
                                                                            style="font-family: var(--bs-font-family-base);">
                                                                            <tspan>May</tspan>
                                                                            <title>May</title>
                                                                        </text><text x="232.0627108487216" y="273.73"
                                                                            text-anchor="middle"
                                                                            dominant-baseline="auto" font-size="13px"
                                                                            font-family="var(--bs-font-family-base)"
                                                                            font-weight="400"
                                                                            fill="var(--bs-secondary-color)"
                                                                            class="apexcharts-text apexcharts-xaxis-label "
                                                                            style="font-family: var(--bs-font-family-base);">
                                                                            <tspan>Jun</tspan>
                                                                            <title>Jun</title>
                                                                        </text><text x="278.4752530184659" y="273.73"
                                                                            text-anchor="middle"
                                                                            dominant-baseline="auto" font-size="13px"
                                                                            font-family="var(--bs-font-family-base)"
                                                                            font-weight="400"
                                                                            fill="var(--bs-secondary-color)"
                                                                            class="apexcharts-text apexcharts-xaxis-label "
                                                                            style="font-family: var(--bs-font-family-base);">
                                                                            <tspan>Jul</tspan>
                                                                            <title>Jul</title>
                                                                        </text><text x="324.8877951882102" y="273.73"
                                                                            text-anchor="middle"
                                                                            dominant-baseline="auto" font-size="13px"
                                                                            font-family="var(--bs-font-family-base)"
                                                                            font-weight="400"
                                                                            fill="var(--bs-secondary-color)"
                                                                            class="apexcharts-text apexcharts-xaxis-label "
                                                                            style="font-family: var(--bs-font-family-base);">
                                                                            <tspan>Aug</tspan>
                                                                            <title>Aug</title>
                                                                        </text><text x="371.3003373579545" y="273.73"
                                                                            text-anchor="middle"
                                                                            dominant-baseline="auto" font-size="13px"
                                                                            font-family="var(--bs-font-family-base)"
                                                                            font-weight="400"
                                                                            fill="var(--bs-secondary-color)"
                                                                            class="apexcharts-text apexcharts-xaxis-label "
                                                                            style="font-family: var(--bs-font-family-base);">
                                                                            <tspan>Sep</tspan>
                                                                            <title>Sep</title>
                                                                        </text><text x="417.7128795276988" y="273.73"
                                                                            text-anchor="middle"
                                                                            dominant-baseline="auto" font-size="13px"
                                                                            font-family="var(--bs-font-family-base)"
                                                                            font-weight="400"
                                                                            fill="var(--bs-secondary-color)"
                                                                            class="apexcharts-text apexcharts-xaxis-label "
                                                                            style="font-family: var(--bs-font-family-base);">
                                                                            <tspan>Oct</tspan>
                                                                            <title>Oct</title>
                                                                        </text><text x="464.12542169744313" y="273.73"
                                                                            text-anchor="middle"
                                                                            dominant-baseline="auto" font-size="13px"
                                                                            font-family="var(--bs-font-family-base)"
                                                                            font-weight="400"
                                                                            fill="var(--bs-secondary-color)"
                                                                            class="apexcharts-text apexcharts-xaxis-label "
                                                                            style="font-family: var(--bs-font-family-base);">
                                                                            <tspan>Nov</tspan>
                                                                            <title>Nov</title>
                                                                        </text><text x="510.53796386718744" y="273.73"
                                                                            text-anchor="middle"
                                                                            dominant-baseline="auto" font-size="13px"
                                                                            font-family="var(--bs-font-family-base)"
                                                                            font-weight="400"
                                                                            fill="var(--bs-secondary-color)"
                                                                            class="apexcharts-text apexcharts-xaxis-label "
                                                                            style="font-family: var(--bs-font-family-base);">
                                                                            <tspan>Dec</tspan>
                                                                            <title>Dec</title>
                                                                        </text></g>
                                                                </g>
                                                                <g class="apexcharts-yaxis-annotations"></g>
                                                                <g class="apexcharts-xaxis-annotations"></g>
                                                                <g class="apexcharts-point-annotations"></g>
                                                            </g>
                                                            <rect width="0" height="0" x="0" y="0" rx="0" ry="0"
                                                                opacity="1" stroke-width="0" stroke="none"
                                                                stroke-dasharray="0" fill="#fefefe"
                                                                class="apexcharts-zoom-rect"></rect>
                                                            <rect width="0" height="0" x="0" y="0" rx="0" ry="0"
                                                                opacity="1" stroke-width="0" stroke="none"
                                                                stroke-dasharray="0" fill="#fefefe"
                                                                class="apexcharts-selection-rect"></rect>
                                                        </svg>
                                                        <div class="apexcharts-tooltip apexcharts-theme-light">
                                                            <div class="apexcharts-tooltip-title"
                                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                            </div>
                                                            <div class="apexcharts-tooltip-series-group apexcharts-tooltip-series-group-0"
                                                                style="order: 1;"><span
                                                                    class="apexcharts-tooltip-marker"
                                                                    style="background-color: var(--bs-primary);"></span>
                                                                <div class="apexcharts-tooltip-text"
                                                                    style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                                    <div class="apexcharts-tooltip-y-group"><span
                                                                            class="apexcharts-tooltip-text-y-label"></span><span
                                                                            class="apexcharts-tooltip-text-y-value"></span>
                                                                    </div>
                                                                    <div class="apexcharts-tooltip-goals-group"><span
                                                                            class="apexcharts-tooltip-text-goals-label"></span><span
                                                                            class="apexcharts-tooltip-text-goals-value"></span>
                                                                    </div>
                                                                    <div class="apexcharts-tooltip-z-group"><span
                                                                            class="apexcharts-tooltip-text-z-label"></span><span
                                                                            class="apexcharts-tooltip-text-z-value"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light">
                                                            <div class="apexcharts-xaxistooltip-text"
                                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                                            <div class="apexcharts-yaxistooltip-text"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card-header d-flex justify-content-between">
                                                <div>
                                                    <h5 class="card-title mb-1">Report</h5>
                                                    <p class="card-subtitle">Monthly Avg. $45.578k</p>
                                                </div>
                                                <div class="dropdown">
                                                    <button class="btn p-0" type="button" id="totalReport"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i
                                                            class="icon-base bx bx-dots-vertical-rounded icon-lg text-body-secondary"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end"
                                                        aria-labelledby="totalReport">
                                                        <a class="dropdown-item" href="javascript:void(0);">Last 28
                                                            Days</a>
                                                        <a class="dropdown-item" href="javascript:void(0);">Last
                                                            Month</a>
                                                        <a class="dropdown-item" href="javascript:void(0);">Last
                                                            Year</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body pt-lg-6">
                                                <div class="report-list">
                                                    <div class="report-list-item rounded-2 mb-4">
                                                        <div class="d-flex align-items-center">
                                                            <div class="report-list-icon shadow-xs me-4">
                                                                <img src="./components/img/paypal-icon.svg"
                                                                    width="22" height="22" alt="Paypal">
                                                            </div>
                                                            <div
                                                                class="d-flex justify-content-between align-items-center w-100 flex-wrap gap-2">
                                                                <div class="d-flex flex-column">
                                                                    <span>Income</span>
                                                                    <h5 class="mb-0">$42,845</h5>
                                                                </div>
                                                                <small class="text-success">+2.34k</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="report-list-item rounded-2 mb-4">
                                                        <div class="d-flex align-items-center">
                                                            <div class="report-list-icon shadow-xs me-4">
                                                                <img src="./components/img/credit-card-icon.svg"
                                                                    width="22" height="22" alt="Shopping Bag">
                                                            </div>
                                                            <div
                                                                class="d-flex justify-content-between align-items-center w-100 flex-wrap gap-2">
                                                                <div class="d-flex flex-column">
                                                                    <span>Expense</span>
                                                                    <h5 class="mb-0">$38,658</h5>
                                                                </div>
                                                                <small class="text-danger">-1.15k</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="report-list-item rounded-2">
                                                        <div class="d-flex align-items-center">
                                                            <div class="report-list-icon shadow-xs me-4">
                                                                <img src="./components/img/wallet-icon.svg"
                                                                    width="22" height="22" alt="Wallet">
                                                            </div>
                                                            <div
                                                                class="d-flex justify-content-between align-items-center w-100 flex-wrap gap-2">
                                                                <div class="d-flex flex-column">
                                                                    <span>Profit</span>
                                                                    <h5 class="mb-0">$18,220</h5>
                                                                </div>
                                                                <small class="text-success">+1.35k</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/ Total Income -->
                            </div>
                            <!--/ Total Income -->
                        </div>
                        <div class="row">
                            <!-- Performance -->
                            <div class="col-md-6 col-xxl-4 mb-6">
                                <div class="card h-100">
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                        <h5 class="card-title m-0 me-2">Performance</h5>
                                        <div class="dropdown">
                                            <button class="btn p-0" type="button" id="performanceId"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i
                                                    class="icon-base bx bx-dots-vertical-rounded icon-lg text-body-secondary"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end"
                                                aria-labelledby="performanceId">
                                                <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                                                <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                                                <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row justify-content-between mb-5">
                                            <div class="col-6">
                                                <p class="mb-0">Earnings: $846.17</p>
                                            </div>
                                            <div class="col-6">
                                                <p class="mb-0 text-end">Sales: 25.7M</p>
                                            </div>
                                        </div>
                                        <div id="performanceChart" style="min-height: 325px;">
                                            <div id="apexcharts0rw8zbh2"
                                                class="apexcharts-canvas apexcharts0rw8zbh2 apexcharts-theme-"
                                                style="width: 397px; height: 310px;"><svg
                                                    xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" class="apexcharts-svg"
                                                    xmlns:data="ApexChartsNS" transform="translate(0, 0)" width="397"
                                                    height="310">
                                                    <foreignObject x="0" y="0" width="397" height="310">
                                                        <div class="apexcharts-legend apexcharts-align-center apx-legend-position-bottom"
                                                            xmlns="http://www.w3.org/1999/xhtml"
                                                            style="right: 0px; position: absolute; left: 0px; top: 286px; max-height: 155px;">
                                                            <div class="apexcharts-legend-series" rel="1"
                                                                seriesname="Income" data:collapsed="false"
                                                                style="margin: 4px 10px;"><span
                                                                    class="apexcharts-legend-marker" rel="1"
                                                                    data:collapsed="false"
                                                                    style="height: 10px; width: 10px; left: -5px; top: 0px;"><svg
                                                                        xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        width="100%" height="100%">
                                                                        <path d="M 0, 0 
           m -5, 0 
           a 5,5 0 1,0 10,0 
           a 5,5 0 1,0 -10,0" fill="var(--bs-primary)" fill-opacity="1" stroke="#ffffff" stroke-opacity="1"
                                                                            stroke-linecap="butt" stroke-width="0"
                                                                            stroke-dasharray="0" cx="0" cy="0"
                                                                            shape="circle"
                                                                            class="apexcharts-legend-marker apexcharts-marker apexcharts-marker-circle"
                                                                            style="transform: translate(50%, 50%);">
                                                                        </path>
                                                                    </svg></span><span class="apexcharts-legend-text"
                                                                    rel="1" i="0" data:default-text="Income"
                                                                    data:collapsed="false"
                                                                    style="color: var(--bs-body-color); font-size: 13px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">Income</span>
                                                            </div>
                                                            <div class="apexcharts-legend-series" rel="2"
                                                                seriesname="Earning" data:collapsed="false"
                                                                style="margin: 4px 10px;"><span
                                                                    class="apexcharts-legend-marker" rel="2"
                                                                    data:collapsed="false"
                                                                    style="height: 10px; width: 10px; left: -5px; top: 0px;"><svg
                                                                        xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        width="100%" height="100%">
                                                                        <path d="M 0, 0 
           m -5, 0 
           a 5,5 0 1,0 10,0 
           a 5,5 0 1,0 -10,0" fill="var(--bs-info)" fill-opacity="1" stroke="#ffffff" stroke-opacity="1"
                                                                            stroke-linecap="butt" stroke-width="0"
                                                                            stroke-dasharray="0" cx="0" cy="0"
                                                                            shape="circle"
                                                                            class="apexcharts-legend-marker apexcharts-marker apexcharts-marker-circle"
                                                                            style="transform: translate(50%, 50%);">
                                                                        </path>
                                                                    </svg></span><span class="apexcharts-legend-text"
                                                                    rel="2" i="1" data:default-text="Earning"
                                                                    data:collapsed="false"
                                                                    style="color: var(--bs-body-color); font-size: 13px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">Earning</span>
                                                            </div>
                                                        </div>
                                                        <style type="text/css">
                                                            .apexcharts-flip-y {
                                                                transform: scaleY(-1) translateY(-100%);
                                                                transform-origin: top;
                                                                transform-box: fill-box;
                                                            }

                                                            .apexcharts-flip-x {
                                                                transform: scaleX(-1);
                                                                transform-origin: center;
                                                                transform-box: fill-box;
                                                            }

                                                            .apexcharts-legend {
                                                                display: flex;
                                                                overflow: auto;
                                                                padding: 0 10px;
                                                            }

                                                            .apexcharts-legend.apexcharts-legend-group-horizontal {
                                                                flex-direction: column;
                                                            }

                                                            .apexcharts-legend-group {
                                                                display: flex;
                                                            }

                                                            .apexcharts-legend-group-vertical {
                                                                flex-direction: column-reverse;
                                                            }

                                                            .apexcharts-legend.apx-legend-position-bottom,
                                                            .apexcharts-legend.apx-legend-position-top {
                                                                flex-wrap: wrap
                                                            }

                                                            .apexcharts-legend.apx-legend-position-right,
                                                            .apexcharts-legend.apx-legend-position-left {
                                                                flex-direction: column;
                                                                bottom: 0;
                                                            }

                                                            .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-left,
                                                            .apexcharts-legend.apx-legend-position-top.apexcharts-align-left,
                                                            .apexcharts-legend.apx-legend-position-right,
                                                            .apexcharts-legend.apx-legend-position-left {
                                                                justify-content: flex-start;
                                                                align-items: flex-start;
                                                            }

                                                            .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-center,
                                                            .apexcharts-legend.apx-legend-position-top.apexcharts-align-center {
                                                                justify-content: center;
                                                                align-items: center;
                                                            }

                                                            .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-right,
                                                            .apexcharts-legend.apx-legend-position-top.apexcharts-align-right {
                                                                justify-content: flex-end;
                                                                align-items: flex-end;
                                                            }

                                                            .apexcharts-legend-series {
                                                                cursor: pointer;
                                                                line-height: normal;
                                                                display: flex;
                                                                align-items: center;
                                                            }

                                                            .apexcharts-legend-text {
                                                                position: relative;
                                                                font-size: 14px;
                                                            }

                                                            .apexcharts-legend-text *,
                                                            .apexcharts-legend-marker * {
                                                                pointer-events: none;
                                                            }

                                                            .apexcharts-legend-marker {
                                                                position: relative;
                                                                display: flex;
                                                                align-items: center;
                                                                justify-content: center;
                                                                cursor: pointer;
                                                                margin-right: 1px;
                                                            }

                                                            .apexcharts-legend-series.apexcharts-no-click {
                                                                cursor: auto;
                                                            }

                                                            .apexcharts-legend .apexcharts-hidden-zero-series,
                                                            .apexcharts-legend .apexcharts-hidden-null-series {
                                                                display: none !important;
                                                            }

                                                            .apexcharts-inactive-legend {
                                                                opacity: 0.45;
                                                            }
                                                        </style>
                                                    </foreignObject>
                                                    <g class="apexcharts-inner apexcharts-graphical"
                                                        transform="translate(0, 22)">
                                                        <defs>
                                                            <clipPath id="gridRectMask0rw8zbh2">
                                                                <rect width="385.515625" height="265" x="0" y="0" rx="0"
                                                                    ry="0" opacity="1" stroke-width="0" stroke="none"
                                                                    stroke-dasharray="0" fill="#fff"></rect>
                                                            </clipPath>
                                                            <clipPath id="gridRectBarMask0rw8zbh2">
                                                                <rect width="389.515625" height="269" x="-2" y="-2"
                                                                    rx="0" ry="0" opacity="1" stroke-width="0"
                                                                    stroke="none" stroke-dasharray="0" fill="#fff">
                                                                </rect>
                                                            </clipPath>
                                                            <clipPath id="gridRectMarkerMask0rw8zbh2">
                                                                <rect width="385.515625" height="265" x="0" y="0" rx="0"
                                                                    ry="0" opacity="1" stroke-width="0" stroke="none"
                                                                    stroke-dasharray="0" fill="#fff"></rect>
                                                            </clipPath>
                                                            <clipPath id="forecastMask0rw8zbh2"></clipPath>
                                                            <clipPath id="nonForecastMask0rw8zbh2"></clipPath>
                                                            <filter id="SvgjsFilter1133" width="200%" height="200%"
                                                                x="-50%" y="-50%">
                                                                <feOffset id="SvgjsFeOffset1126" result="offset"
                                                                    in="SourceGraphic" dx="0" dy="6"></feOffset>
                                                                <feGaussianBlur id="SvgjsFeGaussianBlur1127"
                                                                    result="blur" in="offset" stdDeviation="6">
                                                                </feGaussianBlur>
                                                                <feFlood id="SvgjsFeFlood1128" result="flood"
                                                                    in="SourceGraphic" flood-color="#000000"
                                                                    flood-opacity="0.14"></feFlood>
                                                                <feComposite id="SvgjsFeComposite1129" result="shadow"
                                                                    in="flood" in2="blur" operator="in"></feComposite>
                                                                <feMerge id="SvgjsFeMerge1130" result="SvgjsFeMerge1130"
                                                                    in="SourceGraphic">
                                                                    <feMergeNode id="SvgjsFeMergeNode1131"
                                                                        result="SvgjsFeMergeNode1131" in="shadow">
                                                                    </feMergeNode>
                                                                    <feMergeNode id="SvgjsFeMergeNode1132"
                                                                        result="SvgjsFeMergeNode1132"
                                                                        in="SourceGraphic"></feMergeNode>
                                                                </feMerge>
                                                            </filter>
                                                            <filter id="SvgjsFilter1141" width="200%" height="200%"
                                                                x="-50%" y="-50%">
                                                                <feOffset id="SvgjsFeOffset1134" result="offset"
                                                                    in="SourceGraphic" dx="0" dy="6"></feOffset>
                                                                <feGaussianBlur id="SvgjsFeGaussianBlur1135"
                                                                    result="blur" in="offset" stdDeviation="6">
                                                                </feGaussianBlur>
                                                                <feFlood id="SvgjsFeFlood1136" result="flood"
                                                                    in="SourceGraphic" flood-color="#000000"
                                                                    flood-opacity="0.14"></feFlood>
                                                                <feComposite id="SvgjsFeComposite1137" result="shadow"
                                                                    in="flood" in2="blur" operator="in"></feComposite>
                                                                <feMerge id="SvgjsFeMerge1138" result="SvgjsFeMerge1138"
                                                                    in="SourceGraphic">
                                                                    <feMergeNode id="SvgjsFeMergeNode1139"
                                                                        result="SvgjsFeMergeNode1139" in="shadow">
                                                                    </feMergeNode>
                                                                    <feMergeNode id="SvgjsFeMergeNode1140"
                                                                        result="SvgjsFeMergeNode1140"
                                                                        in="SourceGraphic"></feMergeNode>
                                                                </feMerge>
                                                            </filter>
                                                        </defs>
                                                        <g class="apexcharts-grid">
                                                            <g class="apexcharts-gridlines-horizontal"
                                                                style="display: none;">
                                                                <line x1="0" y1="0" x2="385.515625" y2="0"
                                                                    stroke="#e0e0e0" stroke-dasharray="0"
                                                                    stroke-linecap="butt" class="apexcharts-gridline">
                                                                </line>
                                                                <line x1="0" y1="66.25" x2="385.515625" y2="66.25"
                                                                    stroke="#e0e0e0" stroke-dasharray="0"
                                                                    stroke-linecap="butt" class="apexcharts-gridline">
                                                                </line>
                                                                <line x1="0" y1="132.5" x2="385.515625" y2="132.5"
                                                                    stroke="#e0e0e0" stroke-dasharray="0"
                                                                    stroke-linecap="butt" class="apexcharts-gridline">
                                                                </line>
                                                                <line x1="0" y1="198.75" x2="385.515625" y2="198.75"
                                                                    stroke="#e0e0e0" stroke-dasharray="0"
                                                                    stroke-linecap="butt" class="apexcharts-gridline">
                                                                </line>
                                                                <line x1="0" y1="265" x2="385.515625" y2="265"
                                                                    stroke="#e0e0e0" stroke-dasharray="0"
                                                                    stroke-linecap="butt" class="apexcharts-gridline">
                                                                </line>
                                                            </g>
                                                            <g class="apexcharts-gridlines-vertical"
                                                                style="display: none;"></g>
                                                            <line x1="0" y1="265" x2="385.515625" y2="265"
                                                                stroke="transparent" stroke-dasharray="0"
                                                                stroke-linecap="butt"></line>
                                                            <line x1="0" y1="1" x2="0" y2="265" stroke="transparent"
                                                                stroke-dasharray="0" stroke-linecap="butt"></line>
                                                        </g>
                                                        <g class="apexcharts-grid-borders" style="display: none;"></g>
                                                        <g class="apexcharts-radar-series apexcharts-plot-series"
                                                            transform="translate(192.7578125, 132.5)">
                                                            <polygon
                                                                points="0,-108.20833333333333 93.71116556784112,-54.10416666666668 93.71116556784114,54.10416666666664 1.325169890577365e-14,108.20833333333333 -93.71116556784109,54.104166666666714 -93.71116556784116,-54.10416666666659 "
                                                                fill="none" stroke="var(--bs-border-color)"
                                                                stroke-width="1"></polygon>
                                                            <polygon
                                                                points="0,-81.15625 70.28337417588085,-40.57812500000001 70.28337417588085,40.57812499999998 9.938774179330238e-15,81.15625 -70.28337417588082,40.578125000000036 -70.28337417588088,-40.57812499999994 "
                                                                fill="none" stroke="var(--bs-border-color)"
                                                                stroke-width="1"></polygon>
                                                            <polygon
                                                                points="0,-54.104166666666664 46.85558278392056,-27.05208333333334 46.85558278392057,27.05208333333332 6.625849452886825e-15,54.104166666666664 -46.855582783920546,27.052083333333357 -46.85558278392058,-27.052083333333297 "
                                                                fill="none" stroke="var(--bs-border-color)"
                                                                stroke-width="1"></polygon>
                                                            <polygon
                                                                points="0,-27.052083333333332 23.42779139196028,-13.52604166666667 23.427791391960284,13.52604166666666 3.3129247264434125e-15,27.052083333333332 -23.427791391960273,13.526041666666679 -23.42779139196029,-13.526041666666648 "
                                                                fill="none" stroke="var(--bs-border-color)"
                                                                stroke-width="1"></polygon>
                                                            <polygon points="0,0 0,0 0,0 0,0 0,0 0,0 " fill="none"
                                                                stroke="var(--bs-border-color)" stroke-width="1">
                                                            </polygon>
                                                            <line x1="0" y1="-108.20833333333333" x2="0" y2="0"
                                                                stroke="var(--bs-border-color)" stroke-dasharray="0"
                                                                stroke-linecap="butt"></line>
                                                            <line x1="93.71116556784112" y1="-54.10416666666668" x2="0"
                                                                y2="0" stroke="var(--bs-border-color)"
                                                                stroke-dasharray="0" stroke-linecap="butt"></line>
                                                            <line x1="93.71116556784114" y1="54.10416666666664" x2="0"
                                                                y2="0" stroke="var(--bs-border-color)"
                                                                stroke-dasharray="0" stroke-linecap="butt"></line>
                                                            <line x1="1.325169890577365e-14" y1="108.20833333333333"
                                                                x2="0" y2="0" stroke="var(--bs-border-color)"
                                                                stroke-dasharray="0" stroke-linecap="butt"></line>
                                                            <line x1="-93.71116556784109" y1="54.104166666666714" x2="0"
                                                                y2="0" stroke="var(--bs-border-color)"
                                                                stroke-dasharray="0" stroke-linecap="butt"></line>
                                                            <line x1="-93.71116556784116" y1="-54.10416666666659" x2="0"
                                                                y2="0" stroke="var(--bs-border-color)"
                                                                stroke-dasharray="0" stroke-linecap="butt"></line>
                                                            <g class="apexcharts-xaxis"><text x="0"
                                                                    y="-118.20833333333333" text-anchor="middle"
                                                                    dominant-baseline="auto" font-size="13px"
                                                                    font-family="var(--bs-font-family-base)"
                                                                    font-weight="400" fill="var(--bs-secondary-color)"
                                                                    class="apexcharts-xaxis-label" cx="0"
                                                                    cy="-118.20833333333333"
                                                                    style="font-family: var(--bs-font-family-base);">Jan</text><text
                                                                    x="103.71116556784112" y="-54.10416666666668"
                                                                    text-anchor="start" dominant-baseline="auto"
                                                                    font-size="13px"
                                                                    font-family="var(--bs-font-family-base)"
                                                                    font-weight="400" fill="var(--bs-secondary-color)"
                                                                    class="apexcharts-xaxis-label"
                                                                    cx="103.71116556784112" cy="-54.10416666666668"
                                                                    style="font-family: var(--bs-font-family-base);">Feb</text><text
                                                                    x="103.71116556784114" y="54.10416666666664"
                                                                    text-anchor="start" dominant-baseline="auto"
                                                                    font-size="13px"
                                                                    font-family="var(--bs-font-family-base)"
                                                                    font-weight="400" fill="var(--bs-secondary-color)"
                                                                    class="apexcharts-xaxis-label"
                                                                    cx="103.71116556784114" cy="54.10416666666664"
                                                                    style="font-family: var(--bs-font-family-base);">Mar</text><text
                                                                    x="1.325169890577365e-14" y="118.20833333333333"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="13px"
                                                                    font-family="var(--bs-font-family-base)"
                                                                    font-weight="400" fill="var(--bs-secondary-color)"
                                                                    class="apexcharts-xaxis-label"
                                                                    cx="1.325169890577365e-14" cy="118.20833333333333"
                                                                    style="font-family: var(--bs-font-family-base);">Apr</text><text
                                                                    x="-103.71116556784109" y="54.104166666666714"
                                                                    text-anchor="end" dominant-baseline="auto"
                                                                    font-size="13px"
                                                                    font-family="var(--bs-font-family-base)"
                                                                    font-weight="400" fill="var(--bs-secondary-color)"
                                                                    class="apexcharts-xaxis-label"
                                                                    cx="-103.71116556784109" cy="54.104166666666714"
                                                                    style="font-family: var(--bs-font-family-base);">May</text><text
                                                                    x="-103.71116556784116" y="-54.10416666666659"
                                                                    text-anchor="end" dominant-baseline="auto"
                                                                    font-size="13px"
                                                                    font-family="var(--bs-font-family-base)"
                                                                    font-weight="400" fill="var(--bs-secondary-color)"
                                                                    class="apexcharts-xaxis-label"
                                                                    cx="-103.71116556784116" cy="-54.10416666666659"
                                                                    style="font-family: var(--bs-font-family-base);">Jun</text>
                                                            </g>
                                                            <g class="apexcharts-series" data:longestSeries="true"
                                                                seriesName="Income" rel="1" data:realIndex="0">
                                                                <path
                                                                    d="M 0 -70.33541666666666 L 0 -70.33541666666666 L 67.94059503668481 -39.225520833333334 L 72.62615331507688 41.930729166666644 L 1.325169890577365e-14 108.20833333333333 L -67.94059503668478 39.22552083333336 L -56.226699340704705 -32.462499999999956Z"
                                                                    fill="none" fill-opacity="1"
                                                                    stroke="var(--bs-primary)" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="0"
                                                                    stroke-dasharray="0" class="apexcharts-radar"
                                                                    index="0"
                                                                    pathTo="M 0 -70.33541666666666 L 0 -70.33541666666666 L 67.94059503668481 -39.225520833333334 L 72.62615331507688 41.930729166666644 L 1.325169890577365e-14 108.20833333333333 L -67.94059503668478 39.22552083333336 L -56.226699340704705 -32.462499999999956Z"
                                                                    pathFrom="M 0 0"></path>
                                                                <path
                                                                    d="M 0 -70.33541666666666 L 0 -70.33541666666666 L 67.94059503668481 -39.225520833333334 L 72.62615331507688 41.930729166666644 L 1.325169890577365e-14 108.20833333333333 L -67.94059503668478 39.22552083333336 L -56.226699340704705 -32.462499999999956Z"
                                                                    fill="var(--bs-primary)" fill-opacity="1"
                                                                    stroke="var(--bs-primary)" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="0"
                                                                    stroke-dasharray="0" class="apexcharts-radar"
                                                                    index="0"
                                                                    pathTo="M 0 -70.33541666666666 L 0 -70.33541666666666 L 67.94059503668481 -39.225520833333334 L 72.62615331507688 41.930729166666644 L 1.325169890577365e-14 108.20833333333333 L -67.94059503668478 39.22552083333336 L -56.226699340704705 -32.462499999999956Z"
                                                                    pathFrom="M 0 0" filter="url(#SvgjsFilter1133)">
                                                                </path>
                                                                <g
                                                                    class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown">
                                                                    <g class="apexcharts-series-markers">
                                                                        <path d="M 0, -70.33541666666666 
           m -0, 0 
           a 0,0 0 1,0 0,0 
           a 0,0 0 1,0 -0,0" fill="var(--bs-primary)" fill-opacity="1" stroke="#ffffff" stroke-opacity="1"
                                                                            stroke-linecap="butt" stroke-width="1"
                                                                            stroke-dasharray="0" cx="0"
                                                                            cy="-70.33541666666666" shape="circle"
                                                                            class="apexcharts-marker" rel="0" j="0"
                                                                            index="0" default-marker-size="0"></path>
                                                                    </g>
                                                                    <g class="apexcharts-series-markers">
                                                                        <path d="M 67.94059503668481, -39.225520833333334 
           m -0, 0 
           a 0,0 0 1,0 0,0 
           a 0,0 0 1,0 -0,0" fill="var(--bs-primary)" fill-opacity="1" stroke="#ffffff" stroke-opacity="1"
                                                                            stroke-linecap="butt" stroke-width="1"
                                                                            stroke-dasharray="0" cx="67.94059503668481"
                                                                            cy="-39.225520833333334" shape="circle"
                                                                            class="apexcharts-marker" rel="1" j="1"
                                                                            index="0" default-marker-size="0"></path>
                                                                    </g>
                                                                    <g class="apexcharts-series-markers">
                                                                        <path d="M 72.62615331507688, 41.930729166666644 
           m -0, 0 
           a 0,0 0 1,0 0,0 
           a 0,0 0 1,0 -0,0" fill="var(--bs-primary)" fill-opacity="1" stroke="#ffffff" stroke-opacity="1"
                                                                            stroke-linecap="butt" stroke-width="1"
                                                                            stroke-dasharray="0" cx="72.62615331507688"
                                                                            cy="41.930729166666644" shape="circle"
                                                                            class="apexcharts-marker" rel="2" j="2"
                                                                            index="0" default-marker-size="0"></path>
                                                                    </g>
                                                                    <g class="apexcharts-series-markers">
                                                                        <path d="M 1.325169890577365e-14, 108.20833333333333 
           m -0, 0 
           a 0,0 0 1,0 0,0 
           a 0,0 0 1,0 -0,0" fill="var(--bs-primary)" fill-opacity="1" stroke="#ffffff" stroke-opacity="1"
                                                                            stroke-linecap="butt" stroke-width="1"
                                                                            stroke-dasharray="0"
                                                                            cx="1.325169890577365e-14"
                                                                            cy="108.20833333333333" shape="circle"
                                                                            class="apexcharts-marker" rel="3" j="3"
                                                                            index="0" default-marker-size="0"></path>
                                                                    </g>
                                                                    <g class="apexcharts-series-markers">
                                                                        <path d="M -67.94059503668478, 39.22552083333336 
           m -0, 0 
           a 0,0 0 1,0 0,0 
           a 0,0 0 1,0 -0,0" fill="var(--bs-primary)" fill-opacity="1" stroke="#ffffff" stroke-opacity="1"
                                                                            stroke-linecap="butt" stroke-width="1"
                                                                            stroke-dasharray="0" cx="-67.94059503668478"
                                                                            cy="39.22552083333336" shape="circle"
                                                                            class="apexcharts-marker" rel="4" j="4"
                                                                            index="0" default-marker-size="0"></path>
                                                                    </g>
                                                                    <g class="apexcharts-series-markers">
                                                                        <path d="M -56.226699340704705, -32.462499999999956 
           m -0, 0 
           a 0,0 0 1,0 0,0 
           a 0,0 0 1,0 -0,0" fill="var(--bs-primary)" fill-opacity="1" stroke="#ffffff" stroke-opacity="1"
                                                                            stroke-linecap="butt" stroke-width="1"
                                                                            stroke-dasharray="0"
                                                                            cx="-56.226699340704705"
                                                                            cy="-32.462499999999956" shape="circle"
                                                                            class="apexcharts-marker" rel="5" j="5"
                                                                            index="0" default-marker-size="0"></path>
                                                                    </g>
                                                                    <g class="apexcharts-series-markers">
                                                                        <path d="M 0, 0 
           m -0, 0 
           a 0,0 0 1,0 0,0 
           a 0,0 0 1,0 -0,0" fill="var(--bs-primary)" fill-opacity="1" stroke="#ffffff" stroke-opacity="1"
                                                                            stroke-linecap="butt" stroke-width="1"
                                                                            stroke-dasharray="0" cx="0" cy="0"
                                                                            shape="circle"
                                                                            class="apexcharts-marker waautf5tw"
                                                                            default-marker-size="0"></path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                            <g class="apexcharts-series" data:longestSeries="true"
                                                                seriesName="Earning" rel="2" data:realIndex="1">
                                                                <path
                                                                    d="M 0 -81.15625 L 0 -81.15625 L 60.91225761909673 -35.16770833333334 L 56.226699340704684 32.462499999999984 L 8.613604288752873e-15 70.33541666666666 L -56.226699340704656 32.46250000000003 L -93.71116556784116 -54.10416666666659Z"
                                                                    fill="none" fill-opacity="1" stroke="var(--bs-info)"
                                                                    stroke-opacity="1" stroke-linecap="butt"
                                                                    stroke-width="0" stroke-dasharray="0"
                                                                    class="apexcharts-radar" index="1"
                                                                    pathTo="M 0 -81.15625 L 0 -81.15625 L 60.91225761909673 -35.16770833333334 L 56.226699340704684 32.462499999999984 L 8.613604288752873e-15 70.33541666666666 L -56.226699340704656 32.46250000000003 L -93.71116556784116 -54.10416666666659Z"
                                                                    pathFrom="M 0 0"></path>
                                                                <path
                                                                    d="M 0 -81.15625 L 0 -81.15625 L 60.91225761909673 -35.16770833333334 L 56.226699340704684 32.462499999999984 L 8.613604288752873e-15 70.33541666666666 L -56.226699340704656 32.46250000000003 L -93.71116556784116 -54.10416666666659Z"
                                                                    fill="var(--bs-info)" fill-opacity="1"
                                                                    stroke="var(--bs-info)" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="0"
                                                                    stroke-dasharray="0" class="apexcharts-radar"
                                                                    index="1"
                                                                    pathTo="M 0 -81.15625 L 0 -81.15625 L 60.91225761909673 -35.16770833333334 L 56.226699340704684 32.462499999999984 L 8.613604288752873e-15 70.33541666666666 L -56.226699340704656 32.46250000000003 L -93.71116556784116 -54.10416666666659Z"
                                                                    pathFrom="M 0 0" filter="url(#SvgjsFilter1141)">
                                                                </path>
                                                                <g
                                                                    class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown">
                                                                    <g class="apexcharts-series-markers">
                                                                        <path d="M 0, -81.15625 
           m -0, 0 
           a 0,0 0 1,0 0,0 
           a 0,0 0 1,0 -0,0" fill="var(--bs-info)" fill-opacity="1" stroke="#ffffff" stroke-opacity="1"
                                                                            stroke-linecap="butt" stroke-width="1"
                                                                            stroke-dasharray="0" cx="0" cy="-81.15625"
                                                                            shape="circle" class="apexcharts-marker"
                                                                            rel="0" j="0" index="1"
                                                                            default-marker-size="0"></path>
                                                                    </g>
                                                                    <g class="apexcharts-series-markers">
                                                                        <path d="M 60.91225761909673, -35.16770833333334 
           m -0, 0 
           a 0,0 0 1,0 0,0 
           a 0,0 0 1,0 -0,0" fill="var(--bs-info)" fill-opacity="1" stroke="#ffffff" stroke-opacity="1"
                                                                            stroke-linecap="butt" stroke-width="1"
                                                                            stroke-dasharray="0" cx="60.91225761909673"
                                                                            cy="-35.16770833333334" shape="circle"
                                                                            class="apexcharts-marker" rel="1" j="1"
                                                                            index="1" default-marker-size="0"></path>
                                                                    </g>
                                                                    <g class="apexcharts-series-markers">
                                                                        <path d="M 56.226699340704684, 32.462499999999984 
           m -0, 0 
           a 0,0 0 1,0 0,0 
           a 0,0 0 1,0 -0,0" fill="var(--bs-info)" fill-opacity="1" stroke="#ffffff" stroke-opacity="1"
                                                                            stroke-linecap="butt" stroke-width="1"
                                                                            stroke-dasharray="0" cx="56.226699340704684"
                                                                            cy="32.462499999999984" shape="circle"
                                                                            class="apexcharts-marker" rel="2" j="2"
                                                                            index="1" default-marker-size="0"></path>
                                                                    </g>
                                                                    <g class="apexcharts-series-markers">
                                                                        <path d="M 8.613604288752873e-15, 70.33541666666666 
           m -0, 0 
           a 0,0 0 1,0 0,0 
           a 0,0 0 1,0 -0,0" fill="var(--bs-info)" fill-opacity="1" stroke="#ffffff" stroke-opacity="1"
                                                                            stroke-linecap="butt" stroke-width="1"
                                                                            stroke-dasharray="0"
                                                                            cx="8.613604288752873e-15"
                                                                            cy="70.33541666666666" shape="circle"
                                                                            class="apexcharts-marker" rel="3" j="3"
                                                                            index="1" default-marker-size="0"></path>
                                                                    </g>
                                                                    <g class="apexcharts-series-markers">
                                                                        <path d="M -56.226699340704656, 32.46250000000003 
           m -0, 0 
           a 0,0 0 1,0 0,0 
           a 0,0 0 1,0 -0,0" fill="var(--bs-info)" fill-opacity="1" stroke="#ffffff" stroke-opacity="1"
                                                                            stroke-linecap="butt" stroke-width="1"
                                                                            stroke-dasharray="0"
                                                                            cx="-56.226699340704656"
                                                                            cy="32.46250000000003" shape="circle"
                                                                            class="apexcharts-marker" rel="4" j="4"
                                                                            index="1" default-marker-size="0"></path>
                                                                    </g>
                                                                    <g class="apexcharts-series-markers">
                                                                        <path d="M -93.71116556784116, -54.10416666666659 
           m -0, 0 
           a 0,0 0 1,0 0,0 
           a 0,0 0 1,0 -0,0" fill="var(--bs-info)" fill-opacity="1" stroke="#ffffff" stroke-opacity="1"
                                                                            stroke-linecap="butt" stroke-width="1"
                                                                            stroke-dasharray="0" cx="-93.71116556784116"
                                                                            cy="-54.10416666666659" shape="circle"
                                                                            class="apexcharts-marker" rel="5" j="5"
                                                                            index="1" default-marker-size="0"></path>
                                                                    </g>
                                                                    <g class="apexcharts-series-markers">
                                                                        <path d="M 0, 0 
           m -0, 0 
           a 0,0 0 1,0 0,0 
           a 0,0 0 1,0 -0,0" fill="var(--bs-primary)" fill-opacity="1" stroke="#ffffff" stroke-opacity="1"
                                                                            stroke-linecap="butt" stroke-width="1"
                                                                            stroke-dasharray="0" cx="0" cy="0"
                                                                            shape="circle"
                                                                            class="apexcharts-marker wxoxly77zh"
                                                                            default-marker-size="0"></path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                            <g class="apexcharts-yaxis"></g>
                                                            <g class="apexcharts-datalabels" data:realIndex="0"></g>
                                                            <g class="apexcharts-datalabels" data:realIndex="1"></g>
                                                        </g>
                                                        <line x1="0" y1="0" x2="385.515625" y2="0" stroke="#b6b6b6"
                                                            stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"
                                                            class="apexcharts-ycrosshairs"></line>
                                                        <line x1="0" y1="0" x2="385.515625" y2="0" stroke="#b6b6b6"
                                                            stroke-dasharray="0" stroke-width="0" stroke-linecap="butt"
                                                            class="apexcharts-ycrosshairs-hidden"></line>
                                                        <g class="apexcharts-yaxis-annotations"></g>
                                                        <g class="apexcharts-xaxis-annotations"></g>
                                                        <g class="apexcharts-point-annotations"></g>
                                                    </g>
                                                    <g class="apexcharts-datalabels-group"
                                                        transform="translate(0, 0) scale(1)"></g>
                                                    <g class="apexcharts-datalabels-group"
                                                        transform="translate(0, 0) scale(1)"></g>
                                                </svg>
                                                <div class="apexcharts-tooltip apexcharts-theme-light">
                                                    <div class="apexcharts-tooltip-title"
                                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                    </div>
                                                    <div class="apexcharts-tooltip-series-group apexcharts-tooltip-series-group-0"
                                                        style="order: 1;"><span class="apexcharts-tooltip-marker"
                                                            style="background-color: var(--bs-primary);"></span>
                                                        <div class="apexcharts-tooltip-text"
                                                            style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                            <div class="apexcharts-tooltip-y-group"><span
                                                                    class="apexcharts-tooltip-text-y-label"></span><span
                                                                    class="apexcharts-tooltip-text-y-value"></span>
                                                            </div>
                                                            <div class="apexcharts-tooltip-goals-group"><span
                                                                    class="apexcharts-tooltip-text-goals-label"></span><span
                                                                    class="apexcharts-tooltip-text-goals-value"></span>
                                                            </div>
                                                            <div class="apexcharts-tooltip-z-group"><span
                                                                    class="apexcharts-tooltip-text-z-label"></span><span
                                                                    class="apexcharts-tooltip-text-z-value"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="apexcharts-tooltip-series-group apexcharts-tooltip-series-group-1"
                                                        style="order: 2;"><span class="apexcharts-tooltip-marker"
                                                            style="background-color: var(--bs-info);"></span>
                                                        <div class="apexcharts-tooltip-text"
                                                            style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                            <div class="apexcharts-tooltip-y-group"><span
                                                                    class="apexcharts-tooltip-text-y-label"></span><span
                                                                    class="apexcharts-tooltip-text-y-value"></span>
                                                            </div>
                                                            <div class="apexcharts-tooltip-goals-group"><span
                                                                    class="apexcharts-tooltip-text-goals-label"></span><span
                                                                    class="apexcharts-tooltip-text-goals-value"></span>
                                                            </div>
                                                            <div class="apexcharts-tooltip-z-group"><span
                                                                    class="apexcharts-tooltip-text-z-label"></span><span
                                                                    class="apexcharts-tooltip-text-z-value"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                                    <div class="apexcharts-yaxistooltip-text"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/ Performance -->

                            <!-- Conversion rate -->
                            <div class="col-md-6 col-xxl-4 mb-6">
                                <div class="card h-100">
                                    <div class="card-header d-flex justify-content-between">
                                        <div class="card-title mb-0">
                                            <h5 class="mb-1 me-2">Conversion Rate</h5>
                                            <p class="card-subtitle">Compared To Last Month</p>
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn text-body-secondary p-0" type="button"
                                                id="conversionRate" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="icon-base bx bx-dots-vertical-rounded icon-lg"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end"
                                                aria-labelledby="conversionRate">
                                                <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                                                <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                                                <a class="dropdown-item" href="javascript:void(0);">Share</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body pt-4">
                                        <div class="d-flex justify-content-between align-items-center mb-6">
                                            <div class="d-flex flex-row align-items-center gap-2">
                                                <h3 class="mb-0">8.72%</h3>
                                                <small class="text-success">
                                                    <i class="icon-base bx bx-chevron-up icon-lg"></i>
                                                    4.8%
                                                </small>
                                            </div>
                                            <div id="conversionRateChart" style="min-height: 80px;">
                                                <div id="apexchartsmhid5l82"
                                                    class="apexcharts-canvas apexchartsmhid5l82 apexcharts-theme-"
                                                    style="width: 140px; height: 80px;"><svg
                                                        xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        class="apexcharts-svg" xmlns:data="ApexChartsNS"
                                                        transform="translate(0, 0)" width="140" height="80">
                                                        <foreignObject x="0" y="0" width="140" height="80">
                                                            <div class="apexcharts-legend"
                                                                xmlns="http://www.w3.org/1999/xhtml"
                                                                style="max-height: 40px;"></div>
                                                            <style type="text/css">
                                                                .apexcharts-flip-y {
                                                                    transform: scaleY(-1) translateY(-100%);
                                                                    transform-origin: top;
                                                                    transform-box: fill-box;
                                                                }

                                                                .apexcharts-flip-x {
                                                                    transform: scaleX(-1);
                                                                    transform-origin: center;
                                                                    transform-box: fill-box;
                                                                }

                                                                .apexcharts-legend {
                                                                    display: flex;
                                                                    overflow: auto;
                                                                    padding: 0 10px;
                                                                }

                                                                .apexcharts-legend.apexcharts-legend-group-horizontal {
                                                                    flex-direction: column;
                                                                }

                                                                .apexcharts-legend-group {
                                                                    display: flex;
                                                                }

                                                                .apexcharts-legend-group-vertical {
                                                                    flex-direction: column-reverse;
                                                                }

                                                                .apexcharts-legend.apx-legend-position-bottom,
                                                                .apexcharts-legend.apx-legend-position-top {
                                                                    flex-wrap: wrap
                                                                }

                                                                .apexcharts-legend.apx-legend-position-right,
                                                                .apexcharts-legend.apx-legend-position-left {
                                                                    flex-direction: column;
                                                                    bottom: 0;
                                                                }

                                                                .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-left,
                                                                .apexcharts-legend.apx-legend-position-top.apexcharts-align-left,
                                                                .apexcharts-legend.apx-legend-position-right,
                                                                .apexcharts-legend.apx-legend-position-left {
                                                                    justify-content: flex-start;
                                                                    align-items: flex-start;
                                                                }

                                                                .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-center,
                                                                .apexcharts-legend.apx-legend-position-top.apexcharts-align-center {
                                                                    justify-content: center;
                                                                    align-items: center;
                                                                }

                                                                .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-right,
                                                                .apexcharts-legend.apx-legend-position-top.apexcharts-align-right {
                                                                    justify-content: flex-end;
                                                                    align-items: flex-end;
                                                                }

                                                                .apexcharts-legend-series {
                                                                    cursor: pointer;
                                                                    line-height: normal;
                                                                    display: flex;
                                                                    align-items: center;
                                                                }

                                                                .apexcharts-legend-text {
                                                                    position: relative;
                                                                    font-size: 14px;
                                                                }

                                                                .apexcharts-legend-text *,
                                                                .apexcharts-legend-marker * {
                                                                    pointer-events: none;
                                                                }

                                                                .apexcharts-legend-marker {
                                                                    position: relative;
                                                                    display: flex;
                                                                    align-items: center;
                                                                    justify-content: center;
                                                                    cursor: pointer;
                                                                    margin-right: 1px;
                                                                }

                                                                .apexcharts-legend-series.apexcharts-no-click {
                                                                    cursor: auto;
                                                                }

                                                                .apexcharts-legend .apexcharts-hidden-zero-series,
                                                                .apexcharts-legend .apexcharts-hidden-null-series {
                                                                    display: none !important;
                                                                }

                                                                .apexcharts-inactive-legend {
                                                                    opacity: 0.45;
                                                                }
                                                            </style>
                                                        </foreignObject>
                                                        <rect width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1"
                                                            stroke-width="0" stroke="none" stroke-dasharray="0"
                                                            fill="#fefefe"></rect>
                                                        <g class="apexcharts-datalabels-group"
                                                            transform="translate(0, 0) scale(1)"></g>
                                                        <g class="apexcharts-datalabels-group"
                                                            transform="translate(0, 0) scale(1)"></g>
                                                        <g class="apexcharts-yaxis" rel="0"
                                                            transform="translate(-18, 0)"></g>
                                                        <g class="apexcharts-inner apexcharts-graphical"
                                                            transform="translate(4.666666666666667, 4.666666666666667)">
                                                            <defs>
                                                                <clipPath id="gridRectMaskmhid5l82">
                                                                    <rect width="127.33333333333334"
                                                                        height="70.66666666666666" x="0" y="0" rx="0"
                                                                        ry="0" opacity="1" stroke-width="0"
                                                                        stroke="none" stroke-dasharray="0" fill="#fff">
                                                                    </rect>
                                                                </clipPath>
                                                                <clipPath id="gridRectBarMaskmhid5l82">
                                                                    <rect width="136.33333333333334"
                                                                        height="79.66666666666666" x="-4.5" y="-4.5"
                                                                        rx="0" ry="0" opacity="1" stroke-width="0"
                                                                        stroke="none" stroke-dasharray="0" fill="#fff">
                                                                    </rect>
                                                                </clipPath>
                                                                <clipPath id="gridRectMarkerMaskmhid5l82">
                                                                    <rect width="141.33333333333334"
                                                                        height="84.66666666666666" x="-7" y="-7" rx="0"
                                                                        ry="0" opacity="1" stroke-width="0"
                                                                        stroke="none" stroke-dasharray="0" fill="#fff">
                                                                    </rect>
                                                                </clipPath>
                                                                <clipPath id="forecastMaskmhid5l82"></clipPath>
                                                                <clipPath id="nonForecastMaskmhid5l82"></clipPath>
                                                                <filter id="SvgjsFilter1149"
                                                                    filterUnits="userSpaceOnUse" width="200%"
                                                                    height="200%" x="-50%" y="-50%">
                                                                    <feOffset id="SvgjsFeOffset1142" result="offset"
                                                                        in="SourceGraphic" dx="5" dy="10"></feOffset>
                                                                    <feGaussianBlur id="SvgjsFeGaussianBlur1143"
                                                                        result="blur" in="offset" stdDeviation="3">
                                                                    </feGaussianBlur>
                                                                    <feFlood id="SvgjsFeFlood1144" result="flood"
                                                                        in="SourceGraphic"
                                                                        flood-color="var(--bs-primary)"
                                                                        flood-opacity="0.15"></feFlood>
                                                                    <feComposite id="SvgjsFeComposite1145"
                                                                        result="shadow" in="flood" in2="blur"
                                                                        operator="in"></feComposite>
                                                                    <feMerge id="SvgjsFeMerge1146"
                                                                        result="SvgjsFeMerge1146" in="SourceGraphic">
                                                                        <feMergeNode id="SvgjsFeMergeNode1147"
                                                                            result="SvgjsFeMergeNode1147" in="shadow">
                                                                        </feMergeNode>
                                                                        <feMergeNode id="SvgjsFeMergeNode1148"
                                                                            result="SvgjsFeMergeNode1148"
                                                                            in="SourceGraphic"></feMergeNode>
                                                                    </feMerge>
                                                                </filter>
                                                            </defs>
                                                            <line x1="0" y1="0" x2="0" y2="70.66666666666666"
                                                                stroke="#b6b6b6" stroke-dasharray="3"
                                                                stroke-linecap="butt" class="apexcharts-xcrosshairs"
                                                                x="0" y="0" width="1" height="70.66666666666666"
                                                                fill="#b1b9c4" filter="none" fill-opacity="0.9"
                                                                stroke-width="1"></line>
                                                            <g class="apexcharts-grid">
                                                                <g class="apexcharts-gridlines-horizontal"
                                                                    style="display: none;">
                                                                    <line x1="0" y1="0" x2="127.33333333333334" y2="0"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line x1="0" y1="35.33333333333333"
                                                                        x2="127.33333333333334" y2="35.33333333333333"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line x1="0" y1="70.66666666666666"
                                                                        x2="127.33333333333334" y2="70.66666666666666"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                </g>
                                                                <g class="apexcharts-gridlines-vertical"
                                                                    style="display: none;"></g>
                                                                <line x1="0" y1="70.66666666666666"
                                                                    x2="127.33333333333334" y2="70.66666666666666"
                                                                    stroke="transparent" stroke-dasharray="0"
                                                                    stroke-linecap="butt"></line>
                                                                <line x1="0" y1="1" x2="0" y2="70.66666666666666"
                                                                    stroke="transparent" stroke-dasharray="0"
                                                                    stroke-linecap="butt"></line>
                                                            </g>
                                                            <g class="apexcharts-grid-borders" style="display: none;">
                                                            </g>
                                                            <g class="apexcharts-line-series apexcharts-plot-series">
                                                                <g class="apexcharts-series" zIndex="0"
                                                                    seriesName="series-1" data:longestSeries="true"
                                                                    rel="1" data:realIndex="0">
                                                                    <path
                                                                        d="M 0 57.59333333333333C 14.855555555555556 57.59333333333333 27.588888888888896 31.799999999999997 42.44444444444445 31.799999999999997C 57.300000000000004 31.799999999999997 70.03333333333335 49.466666666666654 84.8888888888889 49.466666666666654C 99.74444444444445 49.466666666666654 112.47777777777779 19.433333333333323 127.33333333333334 19.433333333333323"
                                                                        fill="none" fill-opacity="1"
                                                                        stroke="var(--bs-primary)" stroke-opacity="1"
                                                                        stroke-linecap="butt" stroke-width="5"
                                                                        stroke-dasharray="0" class="apexcharts-line"
                                                                        index="0" clip-path="url(#gridRectMaskmhid5l82)"
                                                                        filter="url(#SvgjsFilter1149)"
                                                                        pathTo="M 0 57.59333333333333C 14.855555555555556 57.59333333333333 27.588888888888896 31.799999999999997 42.44444444444445 31.799999999999997C 57.300000000000004 31.799999999999997 70.03333333333335 49.466666666666654 84.8888888888889 49.466666666666654C 99.74444444444445 49.466666666666654 112.47777777777779 19.433333333333323 127.33333333333334 19.433333333333323"
                                                                        pathFrom="M 0 70.66666666666666 L 0 70.66666666666666 L 42.44444444444445 70.66666666666666 L 84.8888888888889 70.66666666666666 L 127.33333333333334 70.66666666666666"
                                                                        fill-rule="evenodd"></path>
                                                                    <g class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown"
                                                                        data:realIndex="0">
                                                                        <g class=""
                                                                            clip-path="url(#gridRectMarkerMaskmhid5l82)">
                                                                            <path d="M -1, 57.59333333333333 
           m -6, 0 
           a 6,6 0 1,0 12,0 
           a 6,6 0 1,0 -12,0" fill="transparent" fill-opacity="1" stroke="transparent" stroke-opacity="0.9"
                                                                                stroke-linecap="butt" stroke-width="4"
                                                                                stroke-dasharray="0" cx="-1"
                                                                                cy="57.59333333333333" shape="circle"
                                                                                class="apexcharts-marker no-pointer-events wd6fx8i21"
                                                                                rel="0" j="0" index="0"
                                                                                default-marker-size="6"></path>
                                                                            <path d="M 41.44444444444445, 31.799999999999997 
           m -6, 0 
           a 6,6 0 1,0 12,0 
           a 6,6 0 1,0 -12,0" fill="transparent" fill-opacity="1" stroke="transparent" stroke-opacity="0.9"
                                                                                stroke-linecap="butt" stroke-width="4"
                                                                                stroke-dasharray="0"
                                                                                cx="41.44444444444445"
                                                                                cy="31.799999999999997" shape="circle"
                                                                                class="apexcharts-marker no-pointer-events wcztxz4hd"
                                                                                rel="1" j="1" index="0"
                                                                                default-marker-size="6"></path>
                                                                        </g>
                                                                        <g class=""
                                                                            clip-path="url(#gridRectMarkerMaskmhid5l82)">
                                                                            <path d="M 83.8888888888889, 49.466666666666654 
           m -6, 0 
           a 6,6 0 1,0 12,0 
           a 6,6 0 1,0 -12,0" fill="transparent" fill-opacity="1" stroke="transparent" stroke-opacity="0.9"
                                                                                stroke-linecap="butt" stroke-width="4"
                                                                                stroke-dasharray="0"
                                                                                cx="83.8888888888889"
                                                                                cy="49.466666666666654" shape="circle"
                                                                                class="apexcharts-marker no-pointer-events wxfdjfelo"
                                                                                rel="2" j="2" index="0"
                                                                                default-marker-size="6"></path>
                                                                        </g>
                                                                        <g class=""
                                                                            clip-path="url(#gridRectMarkerMaskmhid5l82)">
                                                                            <path d="M 126.33333333333334, 19.433333333333323 
           m -6, 0 
           a 6,6 0 1,0 12,0 
           a 6,6 0 1,0 -12,0" fill="var(--bs-white)" fill-opacity="1" stroke="var(--bs-primary)" stroke-opacity="0.9"
                                                                                stroke-linecap="butt" stroke-width="4"
                                                                                stroke-dasharray="0"
                                                                                cx="126.33333333333334"
                                                                                cy="19.433333333333323" shape="circle"
                                                                                class="apexcharts-marker no-pointer-events w474cfmxa"
                                                                                rel="3" j="3" index="0"
                                                                                default-marker-size="6"></path>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                                <g class="apexcharts-datalabels" data:realIndex="0"></g>
                                                            </g>
                                                            <line x1="0" y1="0" x2="127.33333333333334" y2="0"
                                                                stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1"
                                                                stroke-linecap="butt" class="apexcharts-ycrosshairs">
                                                            </line>
                                                            <line x1="0" y1="0" x2="127.33333333333334" y2="0"
                                                                stroke="#b6b6b6" stroke-dasharray="0" stroke-width="0"
                                                                stroke-linecap="butt"
                                                                class="apexcharts-ycrosshairs-hidden"></line>
                                                            <g class="apexcharts-xaxis" transform="translate(0, 0)">
                                                                <g class="apexcharts-xaxis-texts-g"
                                                                    transform="translate(0, -4)"></g>
                                                            </g>
                                                            <g class="apexcharts-yaxis-annotations"></g>
                                                            <g class="apexcharts-xaxis-annotations"></g>
                                                            <g class="apexcharts-point-annotations"></g>
                                                        </g>
                                                    </svg>
                                                    <div class="apexcharts-tooltip apexcharts-theme-light">
                                                        <div class="apexcharts-tooltip-title"
                                                            style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                        </div>
                                                        <div class="apexcharts-tooltip-series-group apexcharts-tooltip-series-group-0"
                                                            style="order: 1;"><span class="apexcharts-tooltip-marker"
                                                                style="background-color: var(--bs-primary);"></span>
                                                            <div class="apexcharts-tooltip-text"
                                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                                <div class="apexcharts-tooltip-y-group"><span
                                                                        class="apexcharts-tooltip-text-y-label"></span><span
                                                                        class="apexcharts-tooltip-text-y-value"></span>
                                                                </div>
                                                                <div class="apexcharts-tooltip-goals-group"><span
                                                                        class="apexcharts-tooltip-text-goals-label"></span><span
                                                                        class="apexcharts-tooltip-text-goals-value"></span>
                                                                </div>
                                                                <div class="apexcharts-tooltip-z-group"><span
                                                                        class="apexcharts-tooltip-text-z-label"></span><span
                                                                        class="apexcharts-tooltip-text-z-value"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                                        <div class="apexcharts-yaxistooltip-text"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="p-0 m-0">
                                            <li class="d-flex mb-6">
                                                <div class="d-flex w-100 flex-wrap justify-content-between gap-2">
                                                    <div class="me-2">
                                                        <h6 class="mb-0 fw-normal">Impressions</h6>
                                                        <small>12.4k Visits</small>
                                                    </div>
                                                    <div class="user-progress"><i
                                                            class="icon-base bx icon-lg bx-up-arrow-alt text-success me-2"></i>
                                                        <span>12.8%</span></div>
                                                </div>
                                            </li>
                                            <li class="d-flex mb-6">
                                                <div class="d-flex w-100 flex-wrap justify-content-between gap-2">
                                                    <div class="me-2">
                                                        <h6 class="mb-0 fw-normal">Added To Cart</h6>
                                                        <small>32 Product in cart</small>
                                                    </div>
                                                    <div class="user-progress"><i
                                                            class="icon-base bx icon-lg bx-down-arrow-alt text-danger me-2"></i>
                                                        <span>- 8.5% </span></div>
                                                </div>
                                            </li>
                                            <li class="d-flex mb-6">
                                                <div class="d-flex w-100 flex-wrap justify-content-between gap-2">
                                                    <div class="me-2">
                                                        <h6 class="mb-0 fw-normal">Checkout</h6>
                                                        <small>21 Products checkout</small>
                                                    </div>
                                                    <div class="user-progress"><i
                                                            class="icon-base bx icon-lg bx-up-arrow-alt text-success me-2"></i>
                                                        <span>9.12%</span></div>
                                                </div>
                                            </li>
                                            <li class="d-flex">
                                                <div class="d-flex w-100 flex-wrap justify-content-between gap-2">
                                                    <div class="me-2">
                                                        <h6 class="mb-0 fw-normal">Purchased</h6>
                                                        <small>12 Orders</small>
                                                    </div>
                                                    <div class="user-progress"><i
                                                            class="icon-base bx icon-lg bx-up-arrow-alt text-success me-2"></i>
                                                        <span>2.83%</span></div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--/ Conversion rate -->

                            <div class="col-md-12 col-xxl-4">
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-3 col-lg-6 mb-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div
                                                    class="card-title d-flex align-items-start justify-content-between mb-4">
                                                    <div class="avatar flex-shrink-0">
                                                        <img src="./components/img/computer.png"
                                                            alt="computer" class="rounded">
                                                    </div>
                                                    <div class="dropdown">
                                                        <button class="btn p-0" type="button" id="cardOpt5"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i
                                                                class="icon-base bx bx-dots-vertical-rounded text-body-secondary"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end"
                                                            aria-labelledby="cardOpt5">
                                                            <a class="dropdown-item" href="javascript:void(0);">View
                                                                More</a>
                                                            <a class="dropdown-item"
                                                                href="javascript:void(0);">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="mb-1">Revenue</p>
                                                <h4 class="card-title mb-3">$42,389</h4>
                                                <small class="text-success fw-medium"><i
                                                        class="icon-base bx bx-up-arrow-alt"></i> +52.18%</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-3 col-lg-6 mb-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <span class="d-block fw-medium mb-1">Sales</span>
                                                <h4 class="card-title mb-3">482k</h4>
                                                <span class="badge bg-label-info mb-5">+34%</span>
                                                <small class="d-block mb-1">Sales Target</small>
                                                <div class="d-flex align-items-center">
                                                    <div class="progress w-75 me-2" style="height: 8px;">
                                                        <div class="progress-bar bg-info shadow-none" style="width: 78%"
                                                            role="progressbar" aria-valuenow="78" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                    <small>78%</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-12 mb-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between flex-wrap">
                                                    <div
                                                        class="d-flex align-items-start flex-column justify-content-between">
                                                        <div class="card-title">
                                                            <h5 class="mb-0">Expenses</h5>
                                                        </div>
                                                        <div class="d-flex justify-content-between">
                                                            <div class="mt-auto">
                                                                <h4 class="mb-0">4,234</h4>
                                                                <span class="text-danger text-nowrap fw-medium"><i
                                                                        class="icon-base bx bx-down-arrow-alt"></i>
                                                                    8.2%</span>
                                                            </div>
                                                        </div>
                                                        <span class="badge bg-label-secondary">2023 YEAR</span>
                                                    </div>
                                                    <div id="expensesBarChart" style="min-height: 205px;">
                                                        <div id="apexchartsy4pr9qpr"
                                                            class="apexcharts-canvas apexchartsy4pr9qpr apexcharts-theme-"
                                                            style="width: 300px; height: 190px;"><svg
                                                                xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                class="apexcharts-svg" xmlns:data="ApexChartsNS"
                                                                transform="translate(0, 0)" width="300" height="190">
                                                                <foreignObject x="0" y="0" width="300" height="190">
                                                                    <div class="apexcharts-legend"
                                                                        xmlns="http://www.w3.org/1999/xhtml"
                                                                        style="max-height: 95px;"></div>
                                                                    <style type="text/css">
                                                                        .apexcharts-flip-y {
                                                                            transform: scaleY(-1) translateY(-100%);
                                                                            transform-origin: top;
                                                                            transform-box: fill-box;
                                                                        }

                                                                        .apexcharts-flip-x {
                                                                            transform: scaleX(-1);
                                                                            transform-origin: center;
                                                                            transform-box: fill-box;
                                                                        }

                                                                        .apexcharts-legend {
                                                                            display: flex;
                                                                            overflow: auto;
                                                                            padding: 0 10px;
                                                                        }

                                                                        .apexcharts-legend.apexcharts-legend-group-horizontal {
                                                                            flex-direction: column;
                                                                        }

                                                                        .apexcharts-legend-group {
                                                                            display: flex;
                                                                        }

                                                                        .apexcharts-legend-group-vertical {
                                                                            flex-direction: column-reverse;
                                                                        }

                                                                        .apexcharts-legend.apx-legend-position-bottom,
                                                                        .apexcharts-legend.apx-legend-position-top {
                                                                            flex-wrap: wrap
                                                                        }

                                                                        .apexcharts-legend.apx-legend-position-right,
                                                                        .apexcharts-legend.apx-legend-position-left {
                                                                            flex-direction: column;
                                                                            bottom: 0;
                                                                        }

                                                                        .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-left,
                                                                        .apexcharts-legend.apx-legend-position-top.apexcharts-align-left,
                                                                        .apexcharts-legend.apx-legend-position-right,
                                                                        .apexcharts-legend.apx-legend-position-left {
                                                                            justify-content: flex-start;
                                                                            align-items: flex-start;
                                                                        }

                                                                        .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-center,
                                                                        .apexcharts-legend.apx-legend-position-top.apexcharts-align-center {
                                                                            justify-content: center;
                                                                            align-items: center;
                                                                        }

                                                                        .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-right,
                                                                        .apexcharts-legend.apx-legend-position-top.apexcharts-align-right {
                                                                            justify-content: flex-end;
                                                                            align-items: flex-end;
                                                                        }

                                                                        .apexcharts-legend-series {
                                                                            cursor: pointer;
                                                                            line-height: normal;
                                                                            display: flex;
                                                                            align-items: center;
                                                                        }

                                                                        .apexcharts-legend-text {
                                                                            position: relative;
                                                                            font-size: 14px;
                                                                        }

                                                                        .apexcharts-legend-text *,
                                                                        .apexcharts-legend-marker * {
                                                                            pointer-events: none;
                                                                        }

                                                                        .apexcharts-legend-marker {
                                                                            position: relative;
                                                                            display: flex;
                                                                            align-items: center;
                                                                            justify-content: center;
                                                                            cursor: pointer;
                                                                            margin-right: 1px;
                                                                        }

                                                                        .apexcharts-legend-series.apexcharts-no-click {
                                                                            cursor: auto;
                                                                        }

                                                                        .apexcharts-legend .apexcharts-hidden-zero-series,
                                                                        .apexcharts-legend .apexcharts-hidden-null-series {
                                                                            display: none !important;
                                                                        }

                                                                        .apexcharts-inactive-legend {
                                                                            opacity: 0.45;
                                                                        }
                                                                    </style>
                                                                </foreignObject>
                                                                <g class="apexcharts-datalabels-group"
                                                                    transform="translate(0, 0) scale(1)"></g>
                                                                <g class="apexcharts-datalabels-group"
                                                                    transform="translate(0, 0) scale(1)"></g>
                                                                <g class="apexcharts-yaxis" rel="0"
                                                                    transform="translate(-18, 0)"></g>
                                                                <g class="apexcharts-inner apexcharts-graphical"
                                                                    transform="translate(12, 20)">
                                                                    <defs>
                                                                        <linearGradient x1="0" y1="0" x2="0" y2="1"
                                                                            id="SvgjsLinearGradient1150">
                                                                            <stop stop-opacity="0.4"
                                                                                stop-color="rgba(216,227,240,0.4)"
                                                                                offset="0"></stop>
                                                                            <stop stop-opacity="0.5"
                                                                                stop-color="rgba(190,209,230,0.5)"
                                                                                offset="1"></stop>
                                                                            <stop stop-opacity="0.5"
                                                                                stop-color="rgba(190,209,230,0.5)"
                                                                                offset="1"></stop>
                                                                        </linearGradient>
                                                                        <clipPath id="gridRectMasky4pr9qpr">
                                                                            <rect width="278" height="155" x="0" y="0"
                                                                                rx="0" ry="0" opacity="1"
                                                                                stroke-width="0" stroke="none"
                                                                                stroke-dasharray="0" fill="#fff"></rect>
                                                                        </clipPath>
                                                                        <clipPath id="gridRectBarMasky4pr9qpr">
                                                                            <rect width="284" height="161" x="-3" y="-3"
                                                                                rx="0" ry="0" opacity="1"
                                                                                stroke-width="0" stroke="none"
                                                                                stroke-dasharray="0" fill="#fff"></rect>
                                                                        </clipPath>
                                                                        <clipPath id="gridRectMarkerMasky4pr9qpr">
                                                                            <rect width="278" height="155" x="0" y="0"
                                                                                rx="0" ry="0" opacity="1"
                                                                                stroke-width="0" stroke="none"
                                                                                stroke-dasharray="0" fill="#fff"></rect>
                                                                        </clipPath>
                                                                        <clipPath id="forecastMasky4pr9qpr"></clipPath>
                                                                        <clipPath id="nonForecastMasky4pr9qpr">
                                                                        </clipPath>
                                                                    </defs>
                                                                    <rect width="11.120000000000001" height="155" x="0"
                                                                        y="0" rx="0" ry="0" opacity="1" stroke-width="0"
                                                                        stroke="#b6b6b6" stroke-dasharray="3"
                                                                        fill="url(#SvgjsLinearGradient1150)"
                                                                        class="apexcharts-xcrosshairs" y2="155"
                                                                        filter="none" fill-opacity="0.9"></rect>
                                                                    <g class="apexcharts-grid">
                                                                        <g class="apexcharts-gridlines-horizontal"
                                                                            style="display: none;">
                                                                            <line x1="0" y1="0" x2="278" y2="0"
                                                                                stroke="#e0e0e0" stroke-dasharray="0"
                                                                                stroke-linecap="butt"
                                                                                class="apexcharts-gridline"></line>
                                                                            <line x1="0" y1="38.75" x2="278" y2="38.75"
                                                                                stroke="#e0e0e0" stroke-dasharray="0"
                                                                                stroke-linecap="butt"
                                                                                class="apexcharts-gridline"></line>
                                                                            <line x1="0" y1="77.5" x2="278" y2="77.5"
                                                                                stroke="#e0e0e0" stroke-dasharray="0"
                                                                                stroke-linecap="butt"
                                                                                class="apexcharts-gridline"></line>
                                                                            <line x1="0" y1="116.25" x2="278"
                                                                                y2="116.25" stroke="#e0e0e0"
                                                                                stroke-dasharray="0"
                                                                                stroke-linecap="butt"
                                                                                class="apexcharts-gridline"></line>
                                                                            <line x1="0" y1="155" x2="278" y2="155"
                                                                                stroke="#e0e0e0" stroke-dasharray="0"
                                                                                stroke-linecap="butt"
                                                                                class="apexcharts-gridline"></line>
                                                                        </g>
                                                                        <g class="apexcharts-gridlines-vertical"
                                                                            style="display: none;"></g>
                                                                        <line x1="0" y1="155" x2="278" y2="155"
                                                                            stroke="transparent" stroke-dasharray="0"
                                                                            stroke-linecap="butt"></line>
                                                                        <line x1="0" y1="1" x2="0" y2="155"
                                                                            stroke="transparent" stroke-dasharray="0"
                                                                            stroke-linecap="butt"></line>
                                                                    </g>
                                                                    <g class="apexcharts-grid-borders"
                                                                        style="display: none;"></g>
                                                                    <g
                                                                        class="apexcharts-bar-series apexcharts-plot-series">
                                                                        <g class="apexcharts-series" seriesName="2021"
                                                                            rel="1" data:realIndex="0">
                                                                            <path
                                                                                d="M 9.34 71.501 L 9.34 54.4385 C 9.34 51.9385 11.84 49.4385 14.34 49.4385 L 14.34 49.4385 C 16.4 49.4385 18.46 51.9385 18.46 54.4385 L 18.46 71.501 C 18.46 74.001 15.96 76.501 13.46 76.501 L 13.46 76.501 C 11.4 76.501 9.34 74.001 9.34 71.501 Z "
                                                                                fill="var(--bs-primary)"
                                                                                fill-opacity="1"
                                                                                stroke="var(--bs-paper-bg)"
                                                                                stroke-opacity="1"
                                                                                stroke-linecap="round" stroke-width="2"
                                                                                stroke-dasharray="0"
                                                                                class="apexcharts-bar-area " index="0"
                                                                                clip-path="url(#gridRectBarMasky4pr9qpr)"
                                                                                pathTo="M 9.34 71.501 L 9.34 54.4385 C 9.34 51.9385 11.84 49.4385 14.34 49.4385 L 14.34 49.4385 C 16.4 49.4385 18.46 51.9385 18.46 54.4385 L 18.46 71.501 C 18.46 74.001 15.96 76.501 13.46 76.501 L 13.46 76.501 C 11.4 76.501 9.34 74.001 9.34 71.501 Z "
                                                                                pathFrom="M 9.34 76.501 L 9.34 76.501 L 18.46 76.501 L 18.46 76.501 L 18.46 76.501 L 18.46 76.501 L 18.46 76.501 L 9.34 76.501 Z"
                                                                                cy="48.4375" cx="35.14" j="0" val="15"
                                                                                barHeight="29.0625"
                                                                                barWidth="11.120000000000001"></path>
                                                                            <path
                                                                                d="M 37.14 71.501 L 37.14 11.8135 C 37.14 9.3135 39.64 6.8134999999999994 42.14 6.8134999999999994 L 42.14 6.8134999999999994 C 44.2 6.8134999999999994 46.260000000000005 9.3135 46.260000000000005 11.8135 L 46.260000000000005 71.501 C 46.260000000000005 74.001 43.760000000000005 76.501 41.260000000000005 76.501 L 41.260000000000005 76.501 C 39.2 76.501 37.14 74.001 37.14 71.501 Z "
                                                                                fill="var(--bs-primary)"
                                                                                fill-opacity="1"
                                                                                stroke="var(--bs-paper-bg)"
                                                                                stroke-opacity="1"
                                                                                stroke-linecap="round" stroke-width="2"
                                                                                stroke-dasharray="0"
                                                                                class="apexcharts-bar-area " index="0"
                                                                                clip-path="url(#gridRectBarMasky4pr9qpr)"
                                                                                pathTo="M 37.14 71.501 L 37.14 11.8135 C 37.14 9.3135 39.64 6.8134999999999994 42.14 6.8134999999999994 L 42.14 6.8134999999999994 C 44.2 6.8134999999999994 46.260000000000005 9.3135 46.260000000000005 11.8135 L 46.260000000000005 71.501 C 46.260000000000005 74.001 43.760000000000005 76.501 41.260000000000005 76.501 L 41.260000000000005 76.501 C 39.2 76.501 37.14 74.001 37.14 71.501 Z "
                                                                                pathFrom="M 37.14 76.501 L 37.14 76.501 L 46.260000000000005 76.501 L 46.260000000000005 76.501 L 46.260000000000005 76.501 L 46.260000000000005 76.501 L 46.260000000000005 76.501 L 37.14 76.501 Z"
                                                                                cy="5.8125" cx="62.94" j="1" val="37"
                                                                                barHeight="71.6875"
                                                                                barWidth="11.120000000000001"></path>
                                                                            <path
                                                                                d="M 64.94 71.501 L 64.94 56.376 C 64.94 53.876 67.44 51.376 69.94 51.376 L 69.94 51.376 C 72 51.376 74.06 53.876 74.06 56.376 L 74.06 71.501 C 74.06 74.001 71.56 76.501 69.06 76.501 L 69.06 76.501 C 67 76.501 64.94 74.001 64.94 71.501 Z "
                                                                                fill="var(--bs-primary)"
                                                                                fill-opacity="1"
                                                                                stroke="var(--bs-paper-bg)"
                                                                                stroke-opacity="1"
                                                                                stroke-linecap="round" stroke-width="2"
                                                                                stroke-dasharray="0"
                                                                                class="apexcharts-bar-area " index="0"
                                                                                clip-path="url(#gridRectBarMasky4pr9qpr)"
                                                                                pathTo="M 64.94 71.501 L 64.94 56.376 C 64.94 53.876 67.44 51.376 69.94 51.376 L 69.94 51.376 C 72 51.376 74.06 53.876 74.06 56.376 L 74.06 71.501 C 74.06 74.001 71.56 76.501 69.06 76.501 L 69.06 76.501 C 67 76.501 64.94 74.001 64.94 71.501 Z "
                                                                                pathFrom="M 64.94 76.501 L 64.94 76.501 L 74.06 76.501 L 74.06 76.501 L 74.06 76.501 L 74.06 76.501 L 74.06 76.501 L 64.94 76.501 Z"
                                                                                cy="50.375" cx="90.74" j="2" val="14"
                                                                                barHeight="27.125"
                                                                                barWidth="11.120000000000001"></path>
                                                                            <path
                                                                                d="M 92.74 71.501 L 92.74 25.376 C 92.74 22.876 95.24 20.376 97.74 20.376 L 97.74 20.376 C 99.8 20.376 101.86 22.876 101.86 25.376 L 101.86 71.501 C 101.86 74.001 99.36 76.501 96.86 76.501 L 96.86 76.501 C 94.8 76.501 92.74 74.001 92.74 71.501 Z "
                                                                                fill="var(--bs-primary)"
                                                                                fill-opacity="1"
                                                                                stroke="var(--bs-paper-bg)"
                                                                                stroke-opacity="1"
                                                                                stroke-linecap="round" stroke-width="2"
                                                                                stroke-dasharray="0"
                                                                                class="apexcharts-bar-area " index="0"
                                                                                clip-path="url(#gridRectBarMasky4pr9qpr)"
                                                                                pathTo="M 92.74 71.501 L 92.74 25.376 C 92.74 22.876 95.24 20.376 97.74 20.376 L 97.74 20.376 C 99.8 20.376 101.86 22.876 101.86 25.376 L 101.86 71.501 C 101.86 74.001 99.36 76.501 96.86 76.501 L 96.86 76.501 C 94.8 76.501 92.74 74.001 92.74 71.501 Z "
                                                                                pathFrom="M 92.74 76.501 L 92.74 76.501 L 101.86 76.501 L 101.86 76.501 L 101.86 76.501 L 101.86 76.501 L 101.86 76.501 L 92.74 76.501 Z"
                                                                                cy="19.375" cx="118.53999999999999"
                                                                                j="3" val="30" barHeight="58.125"
                                                                                barWidth="11.120000000000001"></path>
                                                                            <path
                                                                                d="M 120.53999999999999 71.501 L 120.53999999999999 9.876 C 120.53999999999999 7.3759999999999994 123.03999999999999 4.8759999999999994 125.53999999999999 4.8759999999999994 L 125.53999999999999 4.8759999999999994 C 127.6 4.8759999999999994 129.66 7.3759999999999994 129.66 9.876 L 129.66 71.501 C 129.66 74.001 127.16 76.501 124.66 76.501 L 124.66 76.501 C 122.6 76.501 120.53999999999999 74.001 120.53999999999999 71.501 Z "
                                                                                fill="var(--bs-primary)"
                                                                                fill-opacity="1"
                                                                                stroke="var(--bs-paper-bg)"
                                                                                stroke-opacity="1"
                                                                                stroke-linecap="round" stroke-width="2"
                                                                                stroke-dasharray="0"
                                                                                class="apexcharts-bar-area " index="0"
                                                                                clip-path="url(#gridRectBarMasky4pr9qpr)"
                                                                                pathTo="M 120.53999999999999 71.501 L 120.53999999999999 9.876 C 120.53999999999999 7.3759999999999994 123.03999999999999 4.8759999999999994 125.53999999999999 4.8759999999999994 L 125.53999999999999 4.8759999999999994 C 127.6 4.8759999999999994 129.66 7.3759999999999994 129.66 9.876 L 129.66 71.501 C 129.66 74.001 127.16 76.501 124.66 76.501 L 124.66 76.501 C 122.6 76.501 120.53999999999999 74.001 120.53999999999999 71.501 Z "
                                                                                pathFrom="M 120.53999999999999 76.501 L 120.53999999999999 76.501 L 129.66 76.501 L 129.66 76.501 L 129.66 76.501 L 129.66 76.501 L 129.66 76.501 L 120.53999999999999 76.501 Z"
                                                                                cy="3.875" cx="146.34" j="4" val="38"
                                                                                barHeight="73.625"
                                                                                barWidth="11.120000000000001"></path>
                                                                            <path
                                                                                d="M 148.34 71.501 L 148.34 25.376 C 148.34 22.876 150.84 20.376 153.34 20.376 L 153.34 20.376 C 155.4 20.376 157.46 22.876 157.46 25.376 L 157.46 71.501 C 157.46 74.001 154.96 76.501 152.46 76.501 L 152.46 76.501 C 150.4 76.501 148.34 74.001 148.34 71.501 Z "
                                                                                fill="var(--bs-primary)"
                                                                                fill-opacity="1"
                                                                                stroke="var(--bs-paper-bg)"
                                                                                stroke-opacity="1"
                                                                                stroke-linecap="round" stroke-width="2"
                                                                                stroke-dasharray="0"
                                                                                class="apexcharts-bar-area " index="0"
                                                                                clip-path="url(#gridRectBarMasky4pr9qpr)"
                                                                                pathTo="M 148.34 71.501 L 148.34 25.376 C 148.34 22.876 150.84 20.376 153.34 20.376 L 153.34 20.376 C 155.4 20.376 157.46 22.876 157.46 25.376 L 157.46 71.501 C 157.46 74.001 154.96 76.501 152.46 76.501 L 152.46 76.501 C 150.4 76.501 148.34 74.001 148.34 71.501 Z "
                                                                                pathFrom="M 148.34 76.501 L 148.34 76.501 L 157.46 76.501 L 157.46 76.501 L 157.46 76.501 L 157.46 76.501 L 157.46 76.501 L 148.34 76.501 Z"
                                                                                cy="19.375" cx="174.14000000000001"
                                                                                j="5" val="30" barHeight="58.125"
                                                                                barWidth="11.120000000000001"></path>
                                                                            <path
                                                                                d="M 176.14000000000001 71.501 L 176.14000000000001 44.751 C 176.14000000000001 42.251 178.64000000000001 39.751 181.14000000000001 39.751 L 181.14000000000001 39.751 C 183.20000000000002 39.751 185.26000000000002 42.251 185.26000000000002 44.751 L 185.26000000000002 71.501 C 185.26000000000002 74.001 182.76000000000002 76.501 180.26000000000002 76.501 L 180.26000000000002 76.501 C 178.20000000000002 76.501 176.14000000000001 74.001 176.14000000000001 71.501 Z "
                                                                                fill="var(--bs-primary)"
                                                                                fill-opacity="1"
                                                                                stroke="var(--bs-paper-bg)"
                                                                                stroke-opacity="1"
                                                                                stroke-linecap="round" stroke-width="2"
                                                                                stroke-dasharray="0"
                                                                                class="apexcharts-bar-area " index="0"
                                                                                clip-path="url(#gridRectBarMasky4pr9qpr)"
                                                                                pathTo="M 176.14000000000001 71.501 L 176.14000000000001 44.751 C 176.14000000000001 42.251 178.64000000000001 39.751 181.14000000000001 39.751 L 181.14000000000001 39.751 C 183.20000000000002 39.751 185.26000000000002 42.251 185.26000000000002 44.751 L 185.26000000000002 71.501 C 185.26000000000002 74.001 182.76000000000002 76.501 180.26000000000002 76.501 L 180.26000000000002 76.501 C 178.20000000000002 76.501 176.14000000000001 74.001 176.14000000000001 71.501 Z "
                                                                                pathFrom="M 176.14000000000001 76.501 L 176.14000000000001 76.501 L 185.26000000000002 76.501 L 185.26000000000002 76.501 L 185.26000000000002 76.501 L 185.26000000000002 76.501 L 185.26000000000002 76.501 L 176.14000000000001 76.501 Z"
                                                                                cy="38.75" cx="201.94000000000003" j="6"
                                                                                val="20" barHeight="38.75"
                                                                                barWidth="11.120000000000001"></path>
                                                                            <path
                                                                                d="M 203.94000000000003 71.501 L 203.94000000000003 58.3135 C 203.94000000000003 55.8135 206.44000000000003 53.3135 208.94000000000003 53.3135 L 208.94000000000003 53.3135 C 211.00000000000003 53.3135 213.06000000000003 55.8135 213.06000000000003 58.3135 L 213.06000000000003 71.501 C 213.06000000000003 74.001 210.56000000000003 76.501 208.06000000000003 76.501 L 208.06000000000003 76.501 C 206.00000000000003 76.501 203.94000000000003 74.001 203.94000000000003 71.501 Z "
                                                                                fill="var(--bs-primary)"
                                                                                fill-opacity="1"
                                                                                stroke="var(--bs-paper-bg)"
                                                                                stroke-opacity="1"
                                                                                stroke-linecap="round" stroke-width="2"
                                                                                stroke-dasharray="0"
                                                                                class="apexcharts-bar-area " index="0"
                                                                                clip-path="url(#gridRectBarMasky4pr9qpr)"
                                                                                pathTo="M 203.94000000000003 71.501 L 203.94000000000003 58.3135 C 203.94000000000003 55.8135 206.44000000000003 53.3135 208.94000000000003 53.3135 L 208.94000000000003 53.3135 C 211.00000000000003 53.3135 213.06000000000003 55.8135 213.06000000000003 58.3135 L 213.06000000000003 71.501 C 213.06000000000003 74.001 210.56000000000003 76.501 208.06000000000003 76.501 L 208.06000000000003 76.501 C 206.00000000000003 76.501 203.94000000000003 74.001 203.94000000000003 71.501 Z "
                                                                                pathFrom="M 203.94000000000003 76.501 L 203.94000000000003 76.501 L 213.06000000000003 76.501 L 213.06000000000003 76.501 L 213.06000000000003 76.501 L 213.06000000000003 76.501 L 213.06000000000003 76.501 L 203.94000000000003 76.501 Z"
                                                                                cy="52.3125" cx="229.74000000000004"
                                                                                j="7" val="13" barHeight="25.1875"
                                                                                barWidth="11.120000000000001"></path>
                                                                            <path
                                                                                d="M 231.74000000000004 71.501 L 231.74000000000004 56.376 C 231.74000000000004 53.876 234.24000000000004 51.376 236.74000000000004 51.376 L 236.74000000000004 51.376 C 238.80000000000004 51.376 240.86000000000004 53.876 240.86000000000004 56.376 L 240.86000000000004 71.501 C 240.86000000000004 74.001 238.36000000000004 76.501 235.86000000000004 76.501 L 235.86000000000004 76.501 C 233.80000000000004 76.501 231.74000000000004 74.001 231.74000000000004 71.501 Z "
                                                                                fill="var(--bs-primary)"
                                                                                fill-opacity="1"
                                                                                stroke="var(--bs-paper-bg)"
                                                                                stroke-opacity="1"
                                                                                stroke-linecap="round" stroke-width="2"
                                                                                stroke-dasharray="0"
                                                                                class="apexcharts-bar-area " index="0"
                                                                                clip-path="url(#gridRectBarMasky4pr9qpr)"
                                                                                pathTo="M 231.74000000000004 71.501 L 231.74000000000004 56.376 C 231.74000000000004 53.876 234.24000000000004 51.376 236.74000000000004 51.376 L 236.74000000000004 51.376 C 238.80000000000004 51.376 240.86000000000004 53.876 240.86000000000004 56.376 L 240.86000000000004 71.501 C 240.86000000000004 74.001 238.36000000000004 76.501 235.86000000000004 76.501 L 235.86000000000004 76.501 C 233.80000000000004 76.501 231.74000000000004 74.001 231.74000000000004 71.501 Z "
                                                                                pathFrom="M 231.74000000000004 76.501 L 231.74000000000004 76.501 L 240.86000000000004 76.501 L 240.86000000000004 76.501 L 240.86000000000004 76.501 L 240.86000000000004 76.501 L 240.86000000000004 76.501 L 231.74000000000004 76.501 Z"
                                                                                cy="50.375" cx="257.54" j="8" val="14"
                                                                                barHeight="27.125"
                                                                                barWidth="11.120000000000001"></path>
                                                                            <path
                                                                                d="M 259.54 71.501 L 259.54 38.9385 C 259.54 36.4385 262.04 33.9385 264.54 33.9385 L 264.54 33.9385 C 266.6 33.9385 268.66 36.4385 268.66 38.9385 L 268.66 71.501 C 268.66 74.001 266.16 76.501 263.66 76.501 L 263.66 76.501 C 261.6 76.501 259.54 74.001 259.54 71.501 Z "
                                                                                fill="var(--bs-primary)"
                                                                                fill-opacity="1"
                                                                                stroke="var(--bs-paper-bg)"
                                                                                stroke-opacity="1"
                                                                                stroke-linecap="round" stroke-width="2"
                                                                                stroke-dasharray="0"
                                                                                class="apexcharts-bar-area " index="0"
                                                                                clip-path="url(#gridRectBarMasky4pr9qpr)"
                                                                                pathTo="M 259.54 71.501 L 259.54 38.9385 C 259.54 36.4385 262.04 33.9385 264.54 33.9385 L 264.54 33.9385 C 266.6 33.9385 268.66 36.4385 268.66 38.9385 L 268.66 71.501 C 268.66 74.001 266.16 76.501 263.66 76.501 L 263.66 76.501 C 261.6 76.501 259.54 74.001 259.54 71.501 Z "
                                                                                pathFrom="M 259.54 76.501 L 259.54 76.501 L 268.66 76.501 L 268.66 76.501 L 268.66 76.501 L 268.66 76.501 L 268.66 76.501 L 259.54 76.501 Z"
                                                                                cy="32.9375" cx="285.34000000000003"
                                                                                j="9" val="23" barHeight="44.5625"
                                                                                barWidth="11.120000000000001"></path>
                                                                            <g class="apexcharts-bar-goals-markers">
                                                                                <g className="apexcharts-bar-goals-groups"
                                                                                    class="apexcharts-hidden-element-shown"
                                                                                    clip-path="url(#gridRectMarkerMasky4pr9qpr)">
                                                                                </g>
                                                                                <g className="apexcharts-bar-goals-groups"
                                                                                    class="apexcharts-hidden-element-shown"
                                                                                    clip-path="url(#gridRectMarkerMasky4pr9qpr)">
                                                                                </g>
                                                                                <g className="apexcharts-bar-goals-groups"
                                                                                    class="apexcharts-hidden-element-shown"
                                                                                    clip-path="url(#gridRectMarkerMasky4pr9qpr)">
                                                                                </g>
                                                                                <g className="apexcharts-bar-goals-groups"
                                                                                    class="apexcharts-hidden-element-shown"
                                                                                    clip-path="url(#gridRectMarkerMasky4pr9qpr)">
                                                                                </g>
                                                                                <g className="apexcharts-bar-goals-groups"
                                                                                    class="apexcharts-hidden-element-shown"
                                                                                    clip-path="url(#gridRectMarkerMasky4pr9qpr)">
                                                                                </g>
                                                                                <g className="apexcharts-bar-goals-groups"
                                                                                    class="apexcharts-hidden-element-shown"
                                                                                    clip-path="url(#gridRectMarkerMasky4pr9qpr)">
                                                                                </g>
                                                                                <g className="apexcharts-bar-goals-groups"
                                                                                    class="apexcharts-hidden-element-shown"
                                                                                    clip-path="url(#gridRectMarkerMasky4pr9qpr)">
                                                                                </g>
                                                                                <g className="apexcharts-bar-goals-groups"
                                                                                    class="apexcharts-hidden-element-shown"
                                                                                    clip-path="url(#gridRectMarkerMasky4pr9qpr)">
                                                                                </g>
                                                                                <g className="apexcharts-bar-goals-groups"
                                                                                    class="apexcharts-hidden-element-shown"
                                                                                    clip-path="url(#gridRectMarkerMasky4pr9qpr)">
                                                                                </g>
                                                                                <g className="apexcharts-bar-goals-groups"
                                                                                    class="apexcharts-hidden-element-shown"
                                                                                    clip-path="url(#gridRectMarkerMasky4pr9qpr)">
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                        <g class="apexcharts-series" seriesName="2020"
                                                                            rel="2" data:realIndex="1">
                                                                            <path
                                                                                d="M 9.34 83.50200000000001 L 9.34 135.4395 C 9.34 137.9395 11.84 140.4395 14.34 140.4395 L 14.34 140.4395 C 16.4 140.4395 18.46 137.9395 18.46 135.4395 L 18.46 83.50200000000001 C 18.46 81.00200000000001 15.96 78.50200000000001 13.46 78.50200000000001 L 13.46 78.50200000000001 C 11.4 78.50200000000001 9.34 81.00200000000001 9.34 83.50200000000001 Z "
                                                                                fill="var(--bs-warning)"
                                                                                fill-opacity="1"
                                                                                stroke="var(--bs-paper-bg)"
                                                                                stroke-opacity="1"
                                                                                stroke-linecap="round" stroke-width="2"
                                                                                stroke-dasharray="0"
                                                                                class="apexcharts-bar-area " index="1"
                                                                                clip-path="url(#gridRectBarMasky4pr9qpr)"
                                                                                pathTo="M 9.34 83.50200000000001 L 9.34 135.4395 C 9.34 137.9395 11.84 140.4395 14.34 140.4395 L 14.34 140.4395 C 16.4 140.4395 18.46 137.9395 18.46 135.4395 L 18.46 83.50200000000001 C 18.46 81.00200000000001 15.96 78.50200000000001 13.46 78.50200000000001 L 13.46 78.50200000000001 C 11.4 78.50200000000001 9.34 81.00200000000001 9.34 83.50200000000001 Z "
                                                                                pathFrom="M 9.34 78.50200000000001 L 9.34 78.50200000000001 L 18.46 78.50200000000001 L 18.46 78.50200000000001 L 18.46 78.50200000000001 L 18.46 78.50200000000001 L 18.46 78.50200000000001 L 9.34 78.50200000000001 Z"
                                                                                cy="141.4385" cx="35.14" j="0" val="-33"
                                                                                barHeight="-63.9375"
                                                                                barWidth="11.120000000000001"></path>
                                                                            <path
                                                                                d="M 37.14 83.50200000000001 L 37.14 116.06450000000001 C 37.14 118.56450000000001 39.64 121.06450000000001 42.14 121.06450000000001 L 42.14 121.06450000000001 C 44.2 121.06450000000001 46.260000000000005 118.56450000000001 46.260000000000005 116.06450000000001 L 46.260000000000005 83.50200000000001 C 46.260000000000005 81.00200000000001 43.760000000000005 78.50200000000001 41.260000000000005 78.50200000000001 L 41.260000000000005 78.50200000000001 C 39.2 78.50200000000001 37.14 81.00200000000001 37.14 83.50200000000001 Z "
                                                                                fill="var(--bs-warning)"
                                                                                fill-opacity="1"
                                                                                stroke="var(--bs-paper-bg)"
                                                                                stroke-opacity="1"
                                                                                stroke-linecap="round" stroke-width="2"
                                                                                stroke-dasharray="0"
                                                                                class="apexcharts-bar-area " index="1"
                                                                                clip-path="url(#gridRectBarMasky4pr9qpr)"
                                                                                pathTo="M 37.14 83.50200000000001 L 37.14 116.06450000000001 C 37.14 118.56450000000001 39.64 121.06450000000001 42.14 121.06450000000001 L 42.14 121.06450000000001 C 44.2 121.06450000000001 46.260000000000005 118.56450000000001 46.260000000000005 116.06450000000001 L 46.260000000000005 83.50200000000001 C 46.260000000000005 81.00200000000001 43.760000000000005 78.50200000000001 41.260000000000005 78.50200000000001 L 41.260000000000005 78.50200000000001 C 39.2 78.50200000000001 37.14 81.00200000000001 37.14 83.50200000000001 Z "
                                                                                pathFrom="M 37.14 78.50200000000001 L 37.14 78.50200000000001 L 46.260000000000005 78.50200000000001 L 46.260000000000005 78.50200000000001 L 46.260000000000005 78.50200000000001 L 46.260000000000005 78.50200000000001 L 46.260000000000005 78.50200000000001 L 37.14 78.50200000000001 Z"
                                                                                cy="122.0635" cx="62.94" j="1" val="-23"
                                                                                barHeight="-44.5625"
                                                                                barWidth="11.120000000000001"></path>
                                                                            <path
                                                                                d="M 64.94 83.50200000000001 L 64.94 127.68950000000001 C 64.94 130.1895 67.44 132.6895 69.94 132.6895 L 69.94 132.6895 C 72 132.6895 74.06 130.1895 74.06 127.68950000000001 L 74.06 83.50200000000001 C 74.06 81.00200000000001 71.56 78.50200000000001 69.06 78.50200000000001 L 69.06 78.50200000000001 C 67 78.50200000000001 64.94 81.00200000000001 64.94 83.50200000000001 Z "
                                                                                fill="var(--bs-warning)"
                                                                                fill-opacity="1"
                                                                                stroke="var(--bs-paper-bg)"
                                                                                stroke-opacity="1"
                                                                                stroke-linecap="round" stroke-width="2"
                                                                                stroke-dasharray="0"
                                                                                class="apexcharts-bar-area " index="1"
                                                                                clip-path="url(#gridRectBarMasky4pr9qpr)"
                                                                                pathTo="M 64.94 83.50200000000001 L 64.94 127.68950000000001 C 64.94 130.1895 67.44 132.6895 69.94 132.6895 L 69.94 132.6895 C 72 132.6895 74.06 130.1895 74.06 127.68950000000001 L 74.06 83.50200000000001 C 74.06 81.00200000000001 71.56 78.50200000000001 69.06 78.50200000000001 L 69.06 78.50200000000001 C 67 78.50200000000001 64.94 81.00200000000001 64.94 83.50200000000001 Z "
                                                                                pathFrom="M 64.94 78.50200000000001 L 64.94 78.50200000000001 L 74.06 78.50200000000001 L 74.06 78.50200000000001 L 74.06 78.50200000000001 L 74.06 78.50200000000001 L 74.06 78.50200000000001 L 64.94 78.50200000000001 Z"
                                                                                cy="133.6885" cx="90.74" j="2" val="-29"
                                                                                barHeight="-56.1875"
                                                                                barWidth="11.120000000000001"></path>
                                                                            <path
                                                                                d="M 92.74 83.50200000000001 L 92.74 112.18950000000001 C 92.74 114.68950000000001 95.24 117.18950000000001 97.74 117.18950000000001 L 97.74 117.18950000000001 C 99.8 117.18950000000001 101.86 114.68950000000001 101.86 112.18950000000001 L 101.86 83.50200000000001 C 101.86 81.00200000000001 99.36 78.50200000000001 96.86 78.50200000000001 L 96.86 78.50200000000001 C 94.8 78.50200000000001 92.74 81.00200000000001 92.74 83.50200000000001 Z "
                                                                                fill="var(--bs-warning)"
                                                                                fill-opacity="1"
                                                                                stroke="var(--bs-paper-bg)"
                                                                                stroke-opacity="1"
                                                                                stroke-linecap="round" stroke-width="2"
                                                                                stroke-dasharray="0"
                                                                                class="apexcharts-bar-area " index="1"
                                                                                clip-path="url(#gridRectBarMasky4pr9qpr)"
                                                                                pathTo="M 92.74 83.50200000000001 L 92.74 112.18950000000001 C 92.74 114.68950000000001 95.24 117.18950000000001 97.74 117.18950000000001 L 97.74 117.18950000000001 C 99.8 117.18950000000001 101.86 114.68950000000001 101.86 112.18950000000001 L 101.86 83.50200000000001 C 101.86 81.00200000000001 99.36 78.50200000000001 96.86 78.50200000000001 L 96.86 78.50200000000001 C 94.8 78.50200000000001 92.74 81.00200000000001 92.74 83.50200000000001 Z "
                                                                                pathFrom="M 92.74 78.50200000000001 L 92.74 78.50200000000001 L 101.86 78.50200000000001 L 101.86 78.50200000000001 L 101.86 78.50200000000001 L 101.86 78.50200000000001 L 101.86 78.50200000000001 L 92.74 78.50200000000001 Z"
                                                                                cy="118.1885" cx="118.53999999999999"
                                                                                j="3" val="-21" barHeight="-40.6875"
                                                                                barWidth="11.120000000000001"></path>
                                                                            <path
                                                                                d="M 120.53999999999999 83.50200000000001 L 120.53999999999999 119.93950000000001 C 120.53999999999999 122.43950000000001 123.03999999999999 124.93950000000001 125.53999999999999 124.93950000000001 L 125.53999999999999 124.93950000000001 C 127.6 124.93950000000001 129.66 122.43950000000001 129.66 119.93950000000001 L 129.66 83.50200000000001 C 129.66 81.00200000000001 127.16 78.50200000000001 124.66 78.50200000000001 L 124.66 78.50200000000001 C 122.6 78.50200000000001 120.53999999999999 81.00200000000001 120.53999999999999 83.50200000000001 Z "
                                                                                fill="var(--bs-warning)"
                                                                                fill-opacity="1"
                                                                                stroke="var(--bs-paper-bg)"
                                                                                stroke-opacity="1"
                                                                                stroke-linecap="round" stroke-width="2"
                                                                                stroke-dasharray="0"
                                                                                class="apexcharts-bar-area " index="1"
                                                                                clip-path="url(#gridRectBarMasky4pr9qpr)"
                                                                                pathTo="M 120.53999999999999 83.50200000000001 L 120.53999999999999 119.93950000000001 C 120.53999999999999 122.43950000000001 123.03999999999999 124.93950000000001 125.53999999999999 124.93950000000001 L 125.53999999999999 124.93950000000001 C 127.6 124.93950000000001 129.66 122.43950000000001 129.66 119.93950000000001 L 129.66 83.50200000000001 C 129.66 81.00200000000001 127.16 78.50200000000001 124.66 78.50200000000001 L 124.66 78.50200000000001 C 122.6 78.50200000000001 120.53999999999999 81.00200000000001 120.53999999999999 83.50200000000001 Z "
                                                                                pathFrom="M 120.53999999999999 78.50200000000001 L 120.53999999999999 78.50200000000001 L 129.66 78.50200000000001 L 129.66 78.50200000000001 L 129.66 78.50200000000001 L 129.66 78.50200000000001 L 129.66 78.50200000000001 L 120.53999999999999 78.50200000000001 Z"
                                                                                cy="125.9385" cx="146.34" j="4"
                                                                                val="-25" barHeight="-48.4375"
                                                                                barWidth="11.120000000000001"></path>
                                                                            <path
                                                                                d="M 148.34 83.50200000000001 L 148.34 112.18950000000001 C 148.34 114.68950000000001 150.84 117.18950000000001 153.34 117.18950000000001 L 153.34 117.18950000000001 C 155.4 117.18950000000001 157.46 114.68950000000001 157.46 112.18950000000001 L 157.46 83.50200000000001 C 157.46 81.00200000000001 154.96 78.50200000000001 152.46 78.50200000000001 L 152.46 78.50200000000001 C 150.4 78.50200000000001 148.34 81.00200000000001 148.34 83.50200000000001 Z "
                                                                                fill="var(--bs-warning)"
                                                                                fill-opacity="1"
                                                                                stroke="var(--bs-paper-bg)"
                                                                                stroke-opacity="1"
                                                                                stroke-linecap="round" stroke-width="2"
                                                                                stroke-dasharray="0"
                                                                                class="apexcharts-bar-area " index="1"
                                                                                clip-path="url(#gridRectBarMasky4pr9qpr)"
                                                                                pathTo="M 148.34 83.50200000000001 L 148.34 112.18950000000001 C 148.34 114.68950000000001 150.84 117.18950000000001 153.34 117.18950000000001 L 153.34 117.18950000000001 C 155.4 117.18950000000001 157.46 114.68950000000001 157.46 112.18950000000001 L 157.46 83.50200000000001 C 157.46 81.00200000000001 154.96 78.50200000000001 152.46 78.50200000000001 L 152.46 78.50200000000001 C 150.4 78.50200000000001 148.34 81.00200000000001 148.34 83.50200000000001 Z "
                                                                                pathFrom="M 148.34 78.50200000000001 L 148.34 78.50200000000001 L 157.46 78.50200000000001 L 157.46 78.50200000000001 L 157.46 78.50200000000001 L 157.46 78.50200000000001 L 157.46 78.50200000000001 L 148.34 78.50200000000001 Z"
                                                                                cy="118.1885" cx="174.14000000000001"
                                                                                j="5" val="-21" barHeight="-40.6875"
                                                                                barWidth="11.120000000000001"></path>
                                                                            <path
                                                                                d="M 176.14000000000001 83.50200000000001 L 176.14000000000001 116.06450000000001 C 176.14000000000001 118.56450000000001 178.64000000000001 121.06450000000001 181.14000000000001 121.06450000000001 L 181.14000000000001 121.06450000000001 C 183.20000000000002 121.06450000000001 185.26000000000002 118.56450000000001 185.26000000000002 116.06450000000001 L 185.26000000000002 83.50200000000001 C 185.26000000000002 81.00200000000001 182.76000000000002 78.50200000000001 180.26000000000002 78.50200000000001 L 180.26000000000002 78.50200000000001 C 178.20000000000002 78.50200000000001 176.14000000000001 81.00200000000001 176.14000000000001 83.50200000000001 Z "
                                                                                fill="var(--bs-warning)"
                                                                                fill-opacity="1"
                                                                                stroke="var(--bs-paper-bg)"
                                                                                stroke-opacity="1"
                                                                                stroke-linecap="round" stroke-width="2"
                                                                                stroke-dasharray="0"
                                                                                class="apexcharts-bar-area " index="1"
                                                                                clip-path="url(#gridRectBarMasky4pr9qpr)"
                                                                                pathTo="M 176.14000000000001 83.50200000000001 L 176.14000000000001 116.06450000000001 C 176.14000000000001 118.56450000000001 178.64000000000001 121.06450000000001 181.14000000000001 121.06450000000001 L 181.14000000000001 121.06450000000001 C 183.20000000000002 121.06450000000001 185.26000000000002 118.56450000000001 185.26000000000002 116.06450000000001 L 185.26000000000002 83.50200000000001 C 185.26000000000002 81.00200000000001 182.76000000000002 78.50200000000001 180.26000000000002 78.50200000000001 L 180.26000000000002 78.50200000000001 C 178.20000000000002 78.50200000000001 176.14000000000001 81.00200000000001 176.14000000000001 83.50200000000001 Z "
                                                                                pathFrom="M 176.14000000000001 78.50200000000001 L 176.14000000000001 78.50200000000001 L 185.26000000000002 78.50200000000001 L 185.26000000000002 78.50200000000001 L 185.26000000000002 78.50200000000001 L 185.26000000000002 78.50200000000001 L 185.26000000000002 78.50200000000001 L 176.14000000000001 78.50200000000001 Z"
                                                                                cy="122.0635" cx="201.94000000000003"
                                                                                j="6" val="-23" barHeight="-44.5625"
                                                                                barWidth="11.120000000000001"></path>
                                                                            <path
                                                                                d="M 203.94000000000003 83.50200000000001 L 203.94000000000003 108.31450000000001 C 203.94000000000003 110.81450000000001 206.44000000000003 113.31450000000001 208.94000000000003 113.31450000000001 L 208.94000000000003 113.31450000000001 C 211.00000000000003 113.31450000000001 213.06000000000003 110.81450000000001 213.06000000000003 108.31450000000001 L 213.06000000000003 83.50200000000001 C 213.06000000000003 81.00200000000001 210.56000000000003 78.50200000000001 208.06000000000003 78.50200000000001 L 208.06000000000003 78.50200000000001 C 206.00000000000003 78.50200000000001 203.94000000000003 81.00200000000001 203.94000000000003 83.50200000000001 Z "
                                                                                fill="var(--bs-warning)"
                                                                                fill-opacity="1"
                                                                                stroke="var(--bs-paper-bg)"
                                                                                stroke-opacity="1"
                                                                                stroke-linecap="round" stroke-width="2"
                                                                                stroke-dasharray="0"
                                                                                class="apexcharts-bar-area " index="1"
                                                                                clip-path="url(#gridRectBarMasky4pr9qpr)"
                                                                                pathTo="M 203.94000000000003 83.50200000000001 L 203.94000000000003 108.31450000000001 C 203.94000000000003 110.81450000000001 206.44000000000003 113.31450000000001 208.94000000000003 113.31450000000001 L 208.94000000000003 113.31450000000001 C 211.00000000000003 113.31450000000001 213.06000000000003 110.81450000000001 213.06000000000003 108.31450000000001 L 213.06000000000003 83.50200000000001 C 213.06000000000003 81.00200000000001 210.56000000000003 78.50200000000001 208.06000000000003 78.50200000000001 L 208.06000000000003 78.50200000000001 C 206.00000000000003 78.50200000000001 203.94000000000003 81.00200000000001 203.94000000000003 83.50200000000001 Z "
                                                                                pathFrom="M 203.94000000000003 78.50200000000001 L 203.94000000000003 78.50200000000001 L 213.06000000000003 78.50200000000001 L 213.06000000000003 78.50200000000001 L 213.06000000000003 78.50200000000001 L 213.06000000000003 78.50200000000001 L 213.06000000000003 78.50200000000001 L 203.94000000000003 78.50200000000001 Z"
                                                                                cy="114.3135" cx="229.74000000000004"
                                                                                j="7" val="-19" barHeight="-36.8125"
                                                                                barWidth="11.120000000000001"></path>
                                                                            <path
                                                                                d="M 231.74000000000004 83.50200000000001 L 231.74000000000004 143.1895 C 231.74000000000004 145.6895 234.24000000000004 148.1895 236.74000000000004 148.1895 L 236.74000000000004 148.1895 C 238.80000000000004 148.1895 240.86000000000004 145.6895 240.86000000000004 143.1895 L 240.86000000000004 83.50200000000001 C 240.86000000000004 81.00200000000001 238.36000000000004 78.50200000000001 235.86000000000004 78.50200000000001 L 235.86000000000004 78.50200000000001 C 233.80000000000004 78.50200000000001 231.74000000000004 81.00200000000001 231.74000000000004 83.50200000000001 Z "
                                                                                fill="var(--bs-warning)"
                                                                                fill-opacity="1"
                                                                                stroke="var(--bs-paper-bg)"
                                                                                stroke-opacity="1"
                                                                                stroke-linecap="round" stroke-width="2"
                                                                                stroke-dasharray="0"
                                                                                class="apexcharts-bar-area " index="1"
                                                                                clip-path="url(#gridRectBarMasky4pr9qpr)"
                                                                                pathTo="M 231.74000000000004 83.50200000000001 L 231.74000000000004 143.1895 C 231.74000000000004 145.6895 234.24000000000004 148.1895 236.74000000000004 148.1895 L 236.74000000000004 148.1895 C 238.80000000000004 148.1895 240.86000000000004 145.6895 240.86000000000004 143.1895 L 240.86000000000004 83.50200000000001 C 240.86000000000004 81.00200000000001 238.36000000000004 78.50200000000001 235.86000000000004 78.50200000000001 L 235.86000000000004 78.50200000000001 C 233.80000000000004 78.50200000000001 231.74000000000004 81.00200000000001 231.74000000000004 83.50200000000001 Z "
                                                                                pathFrom="M 231.74000000000004 78.50200000000001 L 231.74000000000004 78.50200000000001 L 240.86000000000004 78.50200000000001 L 240.86000000000004 78.50200000000001 L 240.86000000000004 78.50200000000001 L 240.86000000000004 78.50200000000001 L 240.86000000000004 78.50200000000001 L 231.74000000000004 78.50200000000001 Z"
                                                                                cy="149.1885" cx="257.54" j="8"
                                                                                val="-37" barHeight="-71.6875"
                                                                                barWidth="11.120000000000001"></path>
                                                                            <path
                                                                                d="M 259.54 83.50200000000001 L 259.54 114.12700000000001 C 259.54 116.62700000000001 262.04 119.12700000000001 264.54 119.12700000000001 L 264.54 119.12700000000001 C 266.6 119.12700000000001 268.66 116.62700000000001 268.66 114.12700000000001 L 268.66 83.50200000000001 C 268.66 81.00200000000001 266.16 78.50200000000001 263.66 78.50200000000001 L 263.66 78.50200000000001 C 261.6 78.50200000000001 259.54 81.00200000000001 259.54 83.50200000000001 Z "
                                                                                fill="var(--bs-warning)"
                                                                                fill-opacity="1"
                                                                                stroke="var(--bs-paper-bg)"
                                                                                stroke-opacity="1"
                                                                                stroke-linecap="round" stroke-width="2"
                                                                                stroke-dasharray="0"
                                                                                class="apexcharts-bar-area " index="1"
                                                                                clip-path="url(#gridRectBarMasky4pr9qpr)"
                                                                                pathTo="M 259.54 83.50200000000001 L 259.54 114.12700000000001 C 259.54 116.62700000000001 262.04 119.12700000000001 264.54 119.12700000000001 L 264.54 119.12700000000001 C 266.6 119.12700000000001 268.66 116.62700000000001 268.66 114.12700000000001 L 268.66 83.50200000000001 C 268.66 81.00200000000001 266.16 78.50200000000001 263.66 78.50200000000001 L 263.66 78.50200000000001 C 261.6 78.50200000000001 259.54 81.00200000000001 259.54 83.50200000000001 Z "
                                                                                pathFrom="M 259.54 78.50200000000001 L 259.54 78.50200000000001 L 268.66 78.50200000000001 L 268.66 78.50200000000001 L 268.66 78.50200000000001 L 268.66 78.50200000000001 L 268.66 78.50200000000001 L 259.54 78.50200000000001 Z"
                                                                                cy="120.126" cx="285.34000000000003"
                                                                                j="9" val="-22" barHeight="-42.625"
                                                                                barWidth="11.120000000000001"></path>
                                                                            <g class="apexcharts-bar-goals-markers">
                                                                                <g className="apexcharts-bar-goals-groups"
                                                                                    class="apexcharts-hidden-element-shown"
                                                                                    clip-path="url(#gridRectMarkerMasky4pr9qpr)">
                                                                                </g>
                                                                                <g className="apexcharts-bar-goals-groups"
                                                                                    class="apexcharts-hidden-element-shown"
                                                                                    clip-path="url(#gridRectMarkerMasky4pr9qpr)">
                                                                                </g>
                                                                                <g className="apexcharts-bar-goals-groups"
                                                                                    class="apexcharts-hidden-element-shown"
                                                                                    clip-path="url(#gridRectMarkerMasky4pr9qpr)">
                                                                                </g>
                                                                                <g className="apexcharts-bar-goals-groups"
                                                                                    class="apexcharts-hidden-element-shown"
                                                                                    clip-path="url(#gridRectMarkerMasky4pr9qpr)">
                                                                                </g>
                                                                                <g className="apexcharts-bar-goals-groups"
                                                                                    class="apexcharts-hidden-element-shown"
                                                                                    clip-path="url(#gridRectMarkerMasky4pr9qpr)">
                                                                                </g>
                                                                                <g className="apexcharts-bar-goals-groups"
                                                                                    class="apexcharts-hidden-element-shown"
                                                                                    clip-path="url(#gridRectMarkerMasky4pr9qpr)">
                                                                                </g>
                                                                                <g className="apexcharts-bar-goals-groups"
                                                                                    class="apexcharts-hidden-element-shown"
                                                                                    clip-path="url(#gridRectMarkerMasky4pr9qpr)">
                                                                                </g>
                                                                                <g className="apexcharts-bar-goals-groups"
                                                                                    class="apexcharts-hidden-element-shown"
                                                                                    clip-path="url(#gridRectMarkerMasky4pr9qpr)">
                                                                                </g>
                                                                                <g className="apexcharts-bar-goals-groups"
                                                                                    class="apexcharts-hidden-element-shown"
                                                                                    clip-path="url(#gridRectMarkerMasky4pr9qpr)">
                                                                                </g>
                                                                                <g className="apexcharts-bar-goals-groups"
                                                                                    class="apexcharts-hidden-element-shown"
                                                                                    clip-path="url(#gridRectMarkerMasky4pr9qpr)">
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                        <g class="apexcharts-datalabels"
                                                                            data:realIndex="0"></g>
                                                                        <g class="apexcharts-datalabels"
                                                                            data:realIndex="1"></g>
                                                                    </g>
                                                                    <line x1="0" y1="0" x2="278" y2="0" stroke="#b6b6b6"
                                                                        stroke-dasharray="0" stroke-width="1"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-ycrosshairs"></line>
                                                                    <line x1="0" y1="0" x2="278" y2="0" stroke="#b6b6b6"
                                                                        stroke-dasharray="0" stroke-width="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-ycrosshairs-hidden"></line>
                                                                    <g class="apexcharts-xaxis"
                                                                        transform="translate(0, 0)">
                                                                        <g class="apexcharts-xaxis-texts-g"
                                                                            transform="translate(0, -4)"></g>
                                                                    </g>
                                                                    <g class="apexcharts-yaxis-annotations"></g>
                                                                    <g class="apexcharts-xaxis-annotations"></g>
                                                                    <g class="apexcharts-point-annotations"></g>
                                                                </g>
                                                            </svg>
                                                            <div class="apexcharts-tooltip apexcharts-theme-light">
                                                                <div class="apexcharts-tooltip-title"
                                                                    style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                                </div>
                                                                <div class="apexcharts-tooltip-series-group apexcharts-tooltip-series-group-0"
                                                                    style="order: 1;"><span
                                                                        class="apexcharts-tooltip-marker"
                                                                        style="background-color: var(--bs-primary);"></span>
                                                                    <div class="apexcharts-tooltip-text"
                                                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                                        <div class="apexcharts-tooltip-y-group"><span
                                                                                class="apexcharts-tooltip-text-y-label"></span><span
                                                                                class="apexcharts-tooltip-text-y-value"></span>
                                                                        </div>
                                                                        <div class="apexcharts-tooltip-goals-group">
                                                                            <span
                                                                                class="apexcharts-tooltip-text-goals-label"></span><span
                                                                                class="apexcharts-tooltip-text-goals-value"></span>
                                                                        </div>
                                                                        <div class="apexcharts-tooltip-z-group"><span
                                                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                                                class="apexcharts-tooltip-text-z-value"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="apexcharts-tooltip-series-group apexcharts-tooltip-series-group-1"
                                                                    style="order: 2;"><span
                                                                        class="apexcharts-tooltip-marker"
                                                                        style="background-color: var(--bs-warning);"></span>
                                                                    <div class="apexcharts-tooltip-text"
                                                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                                        <div class="apexcharts-tooltip-y-group"><span
                                                                                class="apexcharts-tooltip-text-y-label"></span><span
                                                                                class="apexcharts-tooltip-text-y-value"></span>
                                                                        </div>
                                                                        <div class="apexcharts-tooltip-goals-group">
                                                                            <span
                                                                                class="apexcharts-tooltip-text-goals-label"></span><span
                                                                                class="apexcharts-tooltip-text-goals-value"></span>
                                                                        </div>
                                                                        <div class="apexcharts-tooltip-z-group"><span
                                                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                                                class="apexcharts-tooltip-text-z-value"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                                                <div class="apexcharts-yaxistooltip-text"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 col-xxl-8 mb-6 mb-lg-0">
                                <div class="card">
                                    <div class="table-responsive text-nowrap">
                                        <table class="table table-sm text-nowrap table-border-top-0">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Category</th>
                                                    <th>Payment</th>
                                                    <th>Order Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-border-bottom-0">
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <img src="../../assets/img/products/oneplus-lg.png"
                                                                alt="Oneplus" height="32" width="32" class="me-3">
                                                            <div class="d-flex flex-column">
                                                                <h6 class="mb-0">OnePlus 7Pro</h6>
                                                                <small class="text-body">OnePlus</small>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="badge bg-label-primary rounded-pill p-1_5 me-3"><i
                                                                class="icon-base bx bx-mobile-alt icon-xs"></i></span>
                                                        Smart Phone
                                                    </td>
                                                    <td>
                                                        <div class="text-body"><span
                                                                class="text-primary fw-medium">$120</span>/499</div>
                                                        <small class="text-body">Partially Paid</small>
                                                    </td>
                                                    <td><span class="badge bg-label-primary">Confirmed</span></td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button"
                                                                class="btn p-0 dropdown-toggle hide-arrow"
                                                                data-bs-toggle="dropdown"><i
                                                                    class="icon-base bx bx-dots-vertical-rounded"></i></button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                                        class="icon-base bx bx-edit-alt me-1"></i> View
                                                                    Details</a>
                                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                                        class="icon-base bx bx-trash me-1"></i>
                                                                    Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <img src="../../assets/img/products/magic-mouse.png"
                                                                alt="Apple" height="32" width="32" class="me-3">
                                                            <div class="d-flex flex-column">
                                                                <h6 class="mb-0">Magic Mouse</h6>
                                                                <small class="text-body">Apple</small>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="badge bg-label-warning rounded-pill p-1_5 me-3"><i
                                                                class="icon-base bx bx-mouse icon-xs"></i></span> Mouse
                                                    </td>
                                                    <td>
                                                        <div><span class="text-primary fw-medium">$149</span></div>
                                                        <small class="text-body">Fully Paid</small>
                                                    </td>
                                                    <td><span class="badge bg-label-success">Completed</span></td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button"
                                                                class="btn p-0 dropdown-toggle hide-arrow"
                                                                data-bs-toggle="dropdown"><i
                                                                    class="icon-base bx bx-dots-vertical-rounded"></i></button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                                        class="icon-base bx bx-edit-alt me-1"></i> View
                                                                    Details</a>
                                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                                        class="icon-base bx bx-trash me-1"></i>
                                                                    Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <img src="../../assets/img/products/imac-pro.png"
                                                                alt="Apple" height="32" width="32" class="me-3">
                                                            <div class="d-flex flex-column">
                                                                <h6 class="mb-0">iMac Pro</h6>
                                                                <small class="text-body">Apple</small>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="badge bg-label-info rounded-pill p-1_5 me-3"><i
                                                                class="icon-base bx bx-desktop icon-xs"></i></span>
                                                        Computer
                                                    </td>
                                                    <td>
                                                        <div class="text-body"><span
                                                                class="text-primary fw-medium">$0</span>/899</div>
                                                        <small class="text-body">Unpaid</small>
                                                    </td>
                                                    <td><span class="badge bg-label-danger">Cancelled</span></td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button"
                                                                class="btn p-0 dropdown-toggle hide-arrow"
                                                                data-bs-toggle="dropdown"><i
                                                                    class="icon-base bx bx-dots-vertical-rounded"></i></button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                                        class="icon-base bx bx-edit-alt me-1"></i> View
                                                                    Details</a>
                                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                                        class="icon-base bx bx-trash me-1"></i>
                                                                    Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <img src="../../assets/img/products/note10.png"
                                                                alt="Samsung" height="32" width="32" class="me-3">
                                                            <div class="d-flex flex-column">
                                                                <h6 class="mb-0">Note 10</h6>
                                                                <small class="text-body">Samsung</small>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="badge bg-label-primary rounded-pill p-1_5 me-3"><i
                                                                class="icon-base bx bx-mobile-alt icon-xs"></i></span>
                                                        Smart Phone
                                                    </td>
                                                    <td>
                                                        <div><span class="text-primary fw-medium">$149</span></div>
                                                        <small class="text-body">Fully Paid</small>
                                                    </td>
                                                    <td><span class="badge bg-label-success">Completed</span></td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button"
                                                                class="btn p-0 dropdown-toggle hide-arrow"
                                                                data-bs-toggle="dropdown"><i
                                                                    class="icon-base bx bx-dots-vertical-rounded"></i></button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                                        class="icon-base bx bx-edit-alt me-1"></i> View
                                                                    Details</a>
                                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                                        class="icon-base bx bx-trash me-1"></i>
                                                                    Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <img src="../../assets/img/products/iphone.png" alt="Apple"
                                                                height="32" width="32" class="me-3">
                                                            <div class="d-flex flex-column">
                                                                <h6 class="mb-0">iPhone 11 Pro</h6>
                                                                <small class="text-body">Apple</small>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="badge bg-label-primary rounded-pill p-1_5 me-3"><i
                                                                class="icon-base bx bx-mobile-alt icon-xs"></i></span>
                                                        Smart Phone
                                                    </td>
                                                    <td>
                                                        <div><span class="text-primary fw-medium">$399</span></div>
                                                        <small class="text-body">Fully Paid</small>
                                                    </td>
                                                    <td><span class="badge bg-label-success">Completed</span></td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button"
                                                                class="btn p-0 dropdown-toggle hide-arrow"
                                                                data-bs-toggle="dropdown"><i
                                                                    class="icon-base bx bx-dots-vertical-rounded"></i></button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                                        class="icon-base bx bx-edit-alt me-1"></i> View
                                                                    Details</a>
                                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                                        class="icon-base bx bx-trash me-1"></i>
                                                                    Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <img src="../../assets/img/products/mi-tv.png" alt="Xiaomi"
                                                                height="32" width="32" class="me-3">
                                                            <div class="d-flex flex-column">
                                                                <h6 class="mb-0">Mi LED TV 4X</h6>
                                                                <small class="text-body">Xiaomi</small>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="badge bg-label-danger rounded-pill p-1_5 me-3"><i
                                                                class="icon-base bx bx-tv icon-xs"></i></span> Smart TV
                                                    </td>
                                                    <td>
                                                        <div class="text-body"><span
                                                                class="text-primary fw-medium">$349</span>/2499</div>
                                                        <small class="text-body">Partially Paid</small>
                                                    </td>
                                                    <td><span class="badge bg-label-primary">Confirmed</span></td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button"
                                                                class="btn p-0 dropdown-toggle hide-arrow"
                                                                data-bs-toggle="dropdown"><i
                                                                    class="icon-base bx bx-dots-vertical-rounded"></i></button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                                        class="icon-base bx bx-edit-alt me-1"></i> View
                                                                    Details</a>
                                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                                        class="icon-base bx bx-trash me-1"></i>
                                                                    Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <img src="../../assets/img/products/logitech-mx.png"
                                                                alt="Logitech" height="32" width="32" class="me-3">
                                                            <div class="d-flex flex-column">
                                                                <h6 class="mb-0">Logitech MX</h6>
                                                                <small class="text-body">Logitech</small>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="badge bg-label-warning rounded-pill p-1_5 me-3"><i
                                                                class="icon-base bx bx-mouse icon-xs"></i></span> Mouse
                                                    </td>
                                                    <td>
                                                        <div><span class="text-primary fw-medium">$89</span></div>
                                                        <small class="text-body">Fully Paid</small>
                                                    </td>
                                                    <td><span class="badge bg-label-primary">Completed</span></td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button"
                                                                class="btn p-0 dropdown-toggle hide-arrow"
                                                                data-bs-toggle="dropdown"><i
                                                                    class="icon-base bx bx-dots-vertical-rounded"></i></button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                                        class="icon-base bx bx-edit-alt me-1"></i> View
                                                                    Details</a>
                                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                                        class="icon-base bx bx-trash me-1"></i>
                                                                    Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Total Balance -->
                            <div class="col-lg-5 col-xxl-4">
                                <div class="card h-100">
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                        <h5 class="card-title m-0 me-2">Total Balance</h5>
                                        <div class="dropdown">
                                            <button class="btn p-0" type="button" id="totalBalance"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i
                                                    class="icon-base bx bx-dots-vertical-rounded icon-lg text-body-secondary"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="totalBalance">
                                                <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                                                <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                                                <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body pb-0">
                                        <div class="row">
                                            <div class="col d-flex">
                                                <div class="me-3">
                                                    <span class="badge rounded-2 bg-label-warning p-2"><i
                                                            class="icon-base bx bx-wallet icon-lg text-warning"></i></span>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0">$2.54k</h6>
                                                    <small>Wallet</small>
                                                </div>
                                            </div>
                                            <div class="col d-flex">
                                                <div class="me-3">
                                                    <span class="badge rounded-2 bg-label-secondary p-2"><i
                                                            class="icon-base bx bx-dollar icon-lg text-secondary"></i></span>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0">$4.2k</h6>
                                                    <small>Paypal</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="totalBalanceChart" style="min-height: 245px;">
                                            <div id="apexchartsivagro0t"
                                                class="apexcharts-canvas apexchartsivagro0t apexcharts-theme-"
                                                style="width: 397px; height: 245px;"><svg
                                                    xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                    class="apexcharts-svg apexcharts-zoomable" xmlns:data="ApexChartsNS"
                                                    transform="translate(0, 0)" width="397" height="245">
                                                    <foreignObject x="0" y="0" width="397" height="245">
                                                        <div class="apexcharts-legend"
                                                            xmlns="http://www.w3.org/1999/xhtml"
                                                            style="max-height: 122.5px;"></div>
                                                        <style type="text/css">
                                                            .apexcharts-flip-y {
                                                                transform: scaleY(-1) translateY(-100%);
                                                                transform-origin: top;
                                                                transform-box: fill-box;
                                                            }

                                                            .apexcharts-flip-x {
                                                                transform: scaleX(-1);
                                                                transform-origin: center;
                                                                transform-box: fill-box;
                                                            }

                                                            .apexcharts-legend {
                                                                display: flex;
                                                                overflow: auto;
                                                                padding: 0 10px;
                                                            }

                                                            .apexcharts-legend.apexcharts-legend-group-horizontal {
                                                                flex-direction: column;
                                                            }

                                                            .apexcharts-legend-group {
                                                                display: flex;
                                                            }

                                                            .apexcharts-legend-group-vertical {
                                                                flex-direction: column-reverse;
                                                            }

                                                            .apexcharts-legend.apx-legend-position-bottom,
                                                            .apexcharts-legend.apx-legend-position-top {
                                                                flex-wrap: wrap
                                                            }

                                                            .apexcharts-legend.apx-legend-position-right,
                                                            .apexcharts-legend.apx-legend-position-left {
                                                                flex-direction: column;
                                                                bottom: 0;
                                                            }

                                                            .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-left,
                                                            .apexcharts-legend.apx-legend-position-top.apexcharts-align-left,
                                                            .apexcharts-legend.apx-legend-position-right,
                                                            .apexcharts-legend.apx-legend-position-left {
                                                                justify-content: flex-start;
                                                                align-items: flex-start;
                                                            }

                                                            .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-center,
                                                            .apexcharts-legend.apx-legend-position-top.apexcharts-align-center {
                                                                justify-content: center;
                                                                align-items: center;
                                                            }

                                                            .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-right,
                                                            .apexcharts-legend.apx-legend-position-top.apexcharts-align-right {
                                                                justify-content: flex-end;
                                                                align-items: flex-end;
                                                            }

                                                            .apexcharts-legend-series {
                                                                cursor: pointer;
                                                                line-height: normal;
                                                                display: flex;
                                                                align-items: center;
                                                            }

                                                            .apexcharts-legend-text {
                                                                position: relative;
                                                                font-size: 14px;
                                                            }

                                                            .apexcharts-legend-text *,
                                                            .apexcharts-legend-marker * {
                                                                pointer-events: none;
                                                            }

                                                            .apexcharts-legend-marker {
                                                                position: relative;
                                                                display: flex;
                                                                align-items: center;
                                                                justify-content: center;
                                                                cursor: pointer;
                                                                margin-right: 1px;
                                                            }

                                                            .apexcharts-legend-series.apexcharts-no-click {
                                                                cursor: auto;
                                                            }

                                                            .apexcharts-legend .apexcharts-hidden-zero-series,
                                                            .apexcharts-legend .apexcharts-hidden-null-series {
                                                                display: none !important;
                                                            }

                                                            .apexcharts-inactive-legend {
                                                                opacity: 0.45;
                                                            }
                                                        </style>
                                                    </foreignObject>
                                                    <rect width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1"
                                                        stroke-width="0" stroke="none" stroke-dasharray="0"
                                                        fill="#fefefe"></rect>
                                                    <g class="apexcharts-datalabels-group"
                                                        transform="translate(0, 0) scale(1)"></g>
                                                    <g class="apexcharts-datalabels-group"
                                                        transform="translate(0, 0) scale(1)"></g>
                                                    <g class="apexcharts-yaxis" rel="0" transform="translate(-8, 0)">
                                                        <g class="apexcharts-yaxis-texts-g"></g>
                                                    </g>
                                                    <g class="apexcharts-inner apexcharts-graphical"
                                                        transform="translate(10, 20)">
                                                        <defs>
                                                            <clipPath id="gridRectMaskivagro0t">
                                                                <rect width="375.515625" height="175.73" x="0" y="0"
                                                                    rx="0" ry="0" opacity="1" stroke-width="0"
                                                                    stroke="none" stroke-dasharray="0" fill="#fff">
                                                                </rect>
                                                            </clipPath>
                                                            <clipPath id="gridRectBarMaskivagro0t">
                                                                <rect width="383.515625" height="183.73" x="-4" y="-4"
                                                                    rx="0" ry="0" opacity="1" stroke-width="0"
                                                                    stroke="none" stroke-dasharray="0" fill="#fff">
                                                                </rect>
                                                            </clipPath>
                                                            <clipPath id="gridRectMarkerMaskivagro0t">
                                                                <rect width="393.515625" height="193.73" x="-9" y="-9"
                                                                    rx="0" ry="0" opacity="1" stroke-width="0"
                                                                    stroke="none" stroke-dasharray="0" fill="#fff">
                                                                </rect>
                                                            </clipPath>
                                                            <clipPath id="forecastMaskivagro0t"></clipPath>
                                                            <clipPath id="nonForecastMaskivagro0t"></clipPath>
                                                            <filter id="SvgjsFilter1158" filterUnits="userSpaceOnUse"
                                                                width="200%" height="200%" x="-50%" y="-50%">
                                                                <feOffset id="SvgjsFeOffset1151" result="offset"
                                                                    in="SourceGraphic" dx="5" dy="10"></feOffset>
                                                                <feGaussianBlur id="SvgjsFeGaussianBlur1152"
                                                                    result="blur" in="offset" stdDeviation="3">
                                                                </feGaussianBlur>
                                                                <feFlood id="SvgjsFeFlood1153" result="flood"
                                                                    in="SourceGraphic" flood-color="var(--bs-warning)"
                                                                    flood-opacity="0.25"></feFlood>
                                                                <feComposite id="SvgjsFeComposite1154" result="shadow"
                                                                    in="flood" in2="blur" operator="in"></feComposite>
                                                                <feMerge id="SvgjsFeMerge1155" result="SvgjsFeMerge1155"
                                                                    in="SourceGraphic">
                                                                    <feMergeNode id="SvgjsFeMergeNode1156"
                                                                        result="SvgjsFeMergeNode1156" in="shadow">
                                                                    </feMergeNode>
                                                                    <feMergeNode id="SvgjsFeMergeNode1157"
                                                                        result="SvgjsFeMergeNode1157"
                                                                        in="SourceGraphic"></feMergeNode>
                                                                </feMerge>
                                                            </filter>
                                                        </defs>
                                                        <line x1="0" y1="0" x2="0" y2="175.73" stroke="#b6b6b6"
                                                            stroke-dasharray="3" stroke-linecap="butt"
                                                            class="apexcharts-xcrosshairs" x="0" y="0" width="1"
                                                            height="175.73" fill="#b1b9c4" filter="none"
                                                            fill-opacity="0.9" stroke-width="1"></line>
                                                        <g class="apexcharts-grid">
                                                            <g class="apexcharts-gridlines-horizontal"
                                                                style="display: none;">
                                                                <line x1="0" y1="0" x2="375.515625" y2="0"
                                                                    stroke="#e0e0e0" stroke-dasharray="0"
                                                                    stroke-linecap="butt" class="apexcharts-gridline">
                                                                </line>
                                                                <line x1="0" y1="35.146" x2="375.515625" y2="35.146"
                                                                    stroke="#e0e0e0" stroke-dasharray="0"
                                                                    stroke-linecap="butt" class="apexcharts-gridline">
                                                                </line>
                                                                <line x1="0" y1="70.292" x2="375.515625" y2="70.292"
                                                                    stroke="#e0e0e0" stroke-dasharray="0"
                                                                    stroke-linecap="butt" class="apexcharts-gridline">
                                                                </line>
                                                                <line x1="0" y1="105.438" x2="375.515625" y2="105.438"
                                                                    stroke="#e0e0e0" stroke-dasharray="0"
                                                                    stroke-linecap="butt" class="apexcharts-gridline">
                                                                </line>
                                                                <line x1="0" y1="140.584" x2="375.515625" y2="140.584"
                                                                    stroke="#e0e0e0" stroke-dasharray="0"
                                                                    stroke-linecap="butt" class="apexcharts-gridline">
                                                                </line>
                                                                <line x1="0" y1="175.73000000000002" x2="375.515625"
                                                                    y2="175.73000000000002" stroke="#e0e0e0"
                                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                                    class="apexcharts-gridline"></line>
                                                            </g>
                                                            <g class="apexcharts-gridlines-vertical"
                                                                style="display: none;"></g>
                                                            <line x1="0" y1="175.73" x2="375.515625" y2="175.73"
                                                                stroke="transparent" stroke-dasharray="0"
                                                                stroke-linecap="butt"></line>
                                                            <line x1="0" y1="1" x2="0" y2="175.73" stroke="transparent"
                                                                stroke-dasharray="0" stroke-linecap="butt"></line>
                                                        </g>
                                                        <g class="apexcharts-grid-borders" style="display: none;"></g>
                                                        <g class="apexcharts-line-series apexcharts-plot-series">
                                                            <g class="apexcharts-series" zIndex="0"
                                                                seriesName="series-1" data:longestSeries="true" rel="1"
                                                                data:realIndex="0">
                                                                <path
                                                                    d="M 0 149.72196C 26.28609375 149.72196 48.81703125000001 98.40879999999999 75.103125 98.40879999999999C 101.38921875 98.40879999999999 123.92015625000002 133.5548 150.20625 133.5548C 176.49234375 133.5548 199.02328125000003 52.718999999999994 225.30937500000002 52.718999999999994C 251.59546875 52.718999999999994 274.12640625 101.92339999999999 300.4125 101.92339999999999C 326.69859375 101.92339999999999 349.22953125000004 24.60220000000001 375.515625 24.60220000000001"
                                                                    fill="none" fill-opacity="1"
                                                                    stroke="var(--bs-warning)" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="4"
                                                                    stroke-dasharray="0" class="apexcharts-line"
                                                                    index="0" clip-path="url(#gridRectMaskivagro0t)"
                                                                    filter="url(#SvgjsFilter1158)"
                                                                    pathTo="M 0 149.72196C 26.28609375 149.72196 48.81703125000001 98.40879999999999 75.103125 98.40879999999999C 101.38921875 98.40879999999999 123.92015625000002 133.5548 150.20625 133.5548C 176.49234375 133.5548 199.02328125000003 52.718999999999994 225.30937500000002 52.718999999999994C 251.59546875 52.718999999999994 274.12640625 101.92339999999999 300.4125 101.92339999999999C 326.69859375 101.92339999999999 349.22953125000004 24.60220000000001 375.515625 24.60220000000001"
                                                                    pathFrom="M 0 175.73 L 0 175.73 L 75.103125 175.73 L 150.20625 175.73 L 225.30937500000002 175.73 L 300.4125 175.73 L 375.515625 175.73"
                                                                    fill-rule="evenodd"></path>
                                                                <g class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown"
                                                                    data:realIndex="0">
                                                                    <g class=""
                                                                        clip-path="url(#gridRectMarkerMaskivagro0t)">
                                                                        <path d="M -1, 149.72196 
           m -6, 0 
           a 6,6 0 1,0 12,0 
           a 6,6 0 1,0 -12,0" fill="transparent" fill-opacity="1" stroke="transparent" stroke-opacity="0.9"
                                                                            stroke-linecap="butt" stroke-width="4"
                                                                            stroke-dasharray="0" cx="-1" cy="149.72196"
                                                                            shape="circle"
                                                                            class="apexcharts-marker no-pointer-events wqaw6wenqf"
                                                                            rel="0" j="0" index="0"
                                                                            default-marker-size="6"></path>
                                                                        <path d="M 74.103125, 98.40879999999999 
           m -6, 0 
           a 6,6 0 1,0 12,0 
           a 6,6 0 1,0 -12,0" fill="transparent" fill-opacity="1" stroke="transparent" stroke-opacity="0.9"
                                                                            stroke-linecap="butt" stroke-width="4"
                                                                            stroke-dasharray="0" cx="74.103125"
                                                                            cy="98.40879999999999" shape="circle"
                                                                            class="apexcharts-marker no-pointer-events wgulq1mag"
                                                                            rel="1" j="1" index="0"
                                                                            default-marker-size="6"></path>
                                                                    </g>
                                                                    <g class=""
                                                                        clip-path="url(#gridRectMarkerMaskivagro0t)">
                                                                        <path d="M 149.20625, 133.5548 
           m -6, 0 
           a 6,6 0 1,0 12,0 
           a 6,6 0 1,0 -12,0" fill="transparent" fill-opacity="1" stroke="transparent" stroke-opacity="0.9"
                                                                            stroke-linecap="butt" stroke-width="4"
                                                                            stroke-dasharray="0" cx="149.20625"
                                                                            cy="133.5548" shape="circle"
                                                                            class="apexcharts-marker no-pointer-events w1sk8uwypl"
                                                                            rel="2" j="2" index="0"
                                                                            default-marker-size="6"></path>
                                                                    </g>
                                                                    <g class=""
                                                                        clip-path="url(#gridRectMarkerMaskivagro0t)">
                                                                        <path d="M 224.30937500000002, 52.718999999999994 
           m -6, 0 
           a 6,6 0 1,0 12,0 
           a 6,6 0 1,0 -12,0" fill="transparent" fill-opacity="1" stroke="transparent" stroke-opacity="0.9"
                                                                            stroke-linecap="butt" stroke-width="4"
                                                                            stroke-dasharray="0" cx="224.30937500000002"
                                                                            cy="52.718999999999994" shape="circle"
                                                                            class="apexcharts-marker no-pointer-events wemrgxyup"
                                                                            rel="3" j="3" index="0"
                                                                            default-marker-size="6"></path>
                                                                    </g>
                                                                    <g class=""
                                                                        clip-path="url(#gridRectMarkerMaskivagro0t)">
                                                                        <path d="M 299.4125, 101.92339999999999 
           m -6, 0 
           a 6,6 0 1,0 12,0 
           a 6,6 0 1,0 -12,0" fill="transparent" fill-opacity="1" stroke="transparent" stroke-opacity="0.9"
                                                                            stroke-linecap="butt" stroke-width="4"
                                                                            stroke-dasharray="0" cx="299.4125"
                                                                            cy="101.92339999999999" shape="circle"
                                                                            class="apexcharts-marker no-pointer-events wpddegs8t"
                                                                            rel="4" j="4" index="0"
                                                                            default-marker-size="6"></path>
                                                                    </g>
                                                                    <g class=""
                                                                        clip-path="url(#gridRectMarkerMaskivagro0t)">
                                                                        <path d="M 374.515625, 24.60220000000001 
           m -8, 0 
           a 8,8 0 1,0 16,0 
           a 8,8 0 1,0 -16,0" fill="var(--bs-white)" fill-opacity="1" stroke="var(--bs-warning)" stroke-opacity="0.9"
                                                                            stroke-linecap="butt" stroke-width="4"
                                                                            stroke-dasharray="0" cx="374.515625"
                                                                            cy="24.60220000000001" shape="circle"
                                                                            class="apexcharts-marker no-pointer-events wy0tsy03u"
                                                                            rel="5" j="5" index="0"
                                                                            default-marker-size="8"></path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                            <g class="apexcharts-datalabels" data:realIndex="0"></g>
                                                        </g>
                                                        <line x1="0" y1="0" x2="375.515625" y2="0" stroke="#b6b6b6"
                                                            stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"
                                                            class="apexcharts-ycrosshairs"></line>
                                                        <line x1="0" y1="0" x2="375.515625" y2="0" stroke="#b6b6b6"
                                                            stroke-dasharray="0" stroke-width="0" stroke-linecap="butt"
                                                            class="apexcharts-ycrosshairs-hidden"></line>
                                                        <g class="apexcharts-xaxis" transform="translate(0, 0)">
                                                            <g class="apexcharts-xaxis-texts-g"
                                                                transform="translate(0, -4)"><text x="0" y="203.73"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="13px"
                                                                    font-family="var(--bs-font-family-base)"
                                                                    font-weight="400" fill="var(--bs-secondary-color)"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: var(--bs-font-family-base);">
                                                                    <tspan>Jan</tspan>
                                                                    <title>Jan</title>
                                                                </text><text x="75.103125" y="203.73"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="13px"
                                                                    font-family="var(--bs-font-family-base)"
                                                                    font-weight="400" fill="var(--bs-secondary-color)"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: var(--bs-font-family-base);">
                                                                    <tspan>Feb</tspan>
                                                                    <title>Feb</title>
                                                                </text><text x="150.20625" y="203.73"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="13px"
                                                                    font-family="var(--bs-font-family-base)"
                                                                    font-weight="400" fill="var(--bs-secondary-color)"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: var(--bs-font-family-base);">
                                                                    <tspan>Mar</tspan>
                                                                    <title>Mar</title>
                                                                </text><text x="225.309375" y="203.73"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="13px"
                                                                    font-family="var(--bs-font-family-base)"
                                                                    font-weight="400" fill="var(--bs-secondary-color)"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: var(--bs-font-family-base);">
                                                                    <tspan>Apr</tspan>
                                                                    <title>Apr</title>
                                                                </text><text x="300.41249999999997" y="203.73"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="13px"
                                                                    font-family="var(--bs-font-family-base)"
                                                                    font-weight="400" fill="var(--bs-secondary-color)"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: var(--bs-font-family-base);">
                                                                    <tspan>May</tspan>
                                                                    <title>May</title>
                                                                </text><text x="375.51562499999994" y="203.73"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="13px"
                                                                    font-family="var(--bs-font-family-base)"
                                                                    font-weight="400" fill="var(--bs-secondary-color)"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: var(--bs-font-family-base);">
                                                                    <tspan>Jun</tspan>
                                                                    <title>Jun</title>
                                                                </text></g>
                                                        </g>
                                                        <g class="apexcharts-yaxis-annotations"></g>
                                                        <g class="apexcharts-xaxis-annotations"></g>
                                                        <g class="apexcharts-point-annotations"></g>
                                                    </g>
                                                    <rect width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1"
                                                        stroke-width="0" stroke="none" stroke-dasharray="0"
                                                        fill="#fefefe" class="apexcharts-zoom-rect"></rect>
                                                    <rect width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1"
                                                        stroke-width="0" stroke="none" stroke-dasharray="0"
                                                        fill="#fefefe" class="apexcharts-selection-rect"></rect>
                                                </svg>
                                                <div class="apexcharts-tooltip apexcharts-theme-light">
                                                    <div class="apexcharts-tooltip-title"
                                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                    </div>
                                                    <div class="apexcharts-tooltip-series-group apexcharts-tooltip-series-group-0"
                                                        style="order: 1;"><span class="apexcharts-tooltip-marker"
                                                            style="background-color: var(--bs-warning);"></span>
                                                        <div class="apexcharts-tooltip-text"
                                                            style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                            <div class="apexcharts-tooltip-y-group"><span
                                                                    class="apexcharts-tooltip-text-y-label"></span><span
                                                                    class="apexcharts-tooltip-text-y-value"></span>
                                                            </div>
                                                            <div class="apexcharts-tooltip-goals-group"><span
                                                                    class="apexcharts-tooltip-text-goals-label"></span><span
                                                                    class="apexcharts-tooltip-text-goals-value"></span>
                                                            </div>
                                                            <div class="apexcharts-tooltip-z-group"><span
                                                                    class="apexcharts-tooltip-text-z-label"></span><span
                                                                    class="apexcharts-tooltip-text-z-value"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light">
                                                    <div class="apexcharts-xaxistooltip-text"
                                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                    </div>
                                                </div>
                                                <div
                                                    class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                                    <div class="apexcharts-yaxistooltip-text"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="m-0">
                                    <div class="card-footer">
                                        <div class="d-flex justify-content-between">
                                            <small class="text-body">You have done 57.6% more sales.<br>Check your new
                                                badge in your profile.</small>
                                            <div>
                                                <span class="badge bg-label-warning rounded-2 p-2"><i
                                                        class="icon-base bx bx-chevron-right icon-md text-warning"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/ Total Balance -->
                        </div>

                    </div>
                    <!-- / Content -->



                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>
    </main>
    <?php include('./components/dash_footer.php') ?>