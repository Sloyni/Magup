<template>
    <div>
        <div class="flex overflow-y-hidden min-h-screen h-screen">
            <!-- sidenav -->
            <div class="flex flex-col w-70 bg-dark-custom text-white">
                <div>
                    <a href="/" class="block text-2xl text-bold text-center mt-5 uppercase">Magup</a>
                </div>
                <div class="flex-1 p-3 overflow-y-auto" id="dashboard-nav">
                    <div class="dashboard-group mt-10">
                        <ul>
                            <li class="item mb-1">
                                <router-link :to="{name:'index'}" class="flex items-center">
                                   <span>
                                    <svg height="15px" viewBox="0 0 512 512" width="15px" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="m197.332031 0h-160c-20.585937 0-37.332031 16.746094-37.332031 37.332031v96c0 20.589844 16.746094 37.335938 37.332031 37.335938h160c20.589844 0 37.335938-16.746094 37.335938-37.335938v-96c0-20.585937-16.746094-37.332031-37.335938-37.332031zm0 0"/><path d="m197.332031 213.332031h-160c-20.585937 0-37.332031 16.746094-37.332031 37.335938v224c0 20.585937 16.746094 37.332031 37.332031 37.332031h160c20.589844 0 37.335938-16.746094 37.335938-37.332031v-224c0-20.589844-16.746094-37.335938-37.335938-37.335938zm0 0"/><path d="m474.667969 341.332031h-160c-20.589844 0-37.335938 16.746094-37.335938 37.335938v96c0 20.585937 16.746094 37.332031 37.335938 37.332031h160c20.585937 0 37.332031-16.746094 37.332031-37.332031v-96c0-20.589844-16.746094-37.335938-37.332031-37.335938zm0 0"/><path d="m474.667969 0h-160c-20.589844 0-37.335938 16.746094-37.335938 37.332031v224c0 20.589844 16.746094 37.335938 37.335938 37.335938h160c20.585937 0 37.332031-16.746094 37.332031-37.335938v-224c0-20.585937-16.746094-37.332031-37.332031-37.332031zm0 0"/></svg>
                                   </span>
                                    <span class="ml-3 value">Tableau de bord</span>
                                </router-link>
                            </li>
                        </ul>
                    </div>
                    <div class="dashboard-group mb-5">
                        <div class="separator">Gérer</div>
                        <ul>
                            <li class="item mb-1">
                                <router-link :to="{name:'my-stores'}" class="flex items-center">
                                   <span>
                                    <svg  enable-background="new 0 0 480.037 480.037" height="15px" viewBox="0 0 480.037 480.037" width="15px" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="m313.037 329.019v151h-65v-142c0-4.418-3.582-8-8-8s-8 3.582-8 8v142h-65v-151c0-13.233 10.766-24 24-24h98c13.234 0 24 10.766 24 24zm131.995-75.47c-27.739 11.362-60.124 6.76-83.778-13.202-3.027-2.554-7.402-2.56-10.427-.004-30.46 25.722-75.08 25.733-105.552.023-3.04-2.565-7.435-2.565-10.475 0-30.486 25.721-75.131 25.692-105.569-.035-3.027-2.558-7.405-2.554-10.433.003-23.663 19.982-56.049 24.583-83.747 13.215-5.255-2.157-11.013 1.723-11.013 7.403v179.068c0 22.091 17.909 40 40 40h87v-151c0-22.056 17.944-40 40-40h98c22.056 0 40 17.944 40 40v151h87c22.091 0 40-17.909 40-40v-179.065c-.001-5.676-5.753-9.557-11.006-7.406zm-384.995-117.53c-4.595 0-8.284-3.873-7.983-8.532.275-4.252 3.996-7.468 8.257-7.468h404.792c5.757 0 9.63-5.898 7.34-11.181l-45.066-103.999c-1.27-2.93-4.15-4.82-7.34-4.82h-360c-3.19 0-6.07 1.89-7.34 4.82l-52 120c-.933 2.12-.66-1.102-.66 52.81.06 36.39 29.67 65.99 66 65.99 22.69 0 42.756-11.542 54.638-29.074 1.614-2.382 5.069-2.382 6.683.001 26.271 38.78 83.101 38.694 109.34.028 1.614-2.379 5.065-2.379 6.679 0 26.259 38.697 83.049 38.717 109.321-.001 1.591-2.345 5.037-2.427 6.624-.08 12.023 17.774 32.474 29.414 55.568 29.12 36.284-.461 65.147-30.72 65.147-67.007v-32.608c0-4.418-3.582-8-8-8h-412z"/></svg>                                   </span>
                                    <span class="ml-3 value">Mes boutiques</span>
                                    <span class="total">3</span>
                                </router-link>
                            </li>
                            <li class="item mb-1">
                                <router-link :to="{name:'my-employees'}" class="flex items-center">
                                   <span>
                                    <svg version="1.1" height="15px" width="15px" fill="currentColor" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            viewBox="0 0 511.999 511.999" style="enable-background:new 0 0 511.999 511.999;" xml:space="preserve">
                                        <g>
                                            <g>
                                                <path d="M438.09,273.32h-39.596c4.036,11.05,6.241,22.975,6.241,35.404v149.65c0,5.182-0.902,10.156-2.543,14.782h65.461
                                                    c24.453,0,44.346-19.894,44.346-44.346v-81.581C512,306.476,478.844,273.32,438.09,273.32z"/>
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path d="M107.265,308.725c0-12.43,2.205-24.354,6.241-35.404H73.91c-40.754,0-73.91,33.156-73.91,73.91v81.581
                                                    c0,24.452,19.893,44.346,44.346,44.346h65.462c-1.641-4.628-2.543-9.601-2.543-14.783V308.725z"/>
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path d="M301.261,234.815h-90.522c-40.754,0-73.91,33.156-73.91,73.91v149.65c0,8.163,6.618,14.782,14.782,14.782h208.778
                                                    c8.164,0,14.782-6.618,14.782-14.782v-149.65C375.171,267.971,342.015,234.815,301.261,234.815z"/>
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path d="M256,38.84c-49.012,0-88.886,39.874-88.886,88.887c0,33.245,18.349,62.28,45.447,77.524
                                                    c12.853,7.23,27.671,11.362,43.439,11.362c15.768,0,30.586-4.132,43.439-11.362c27.099-15.244,45.447-44.28,45.447-77.524
                                                    C344.886,78.715,305.012,38.84,256,38.84z"/>
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path d="M99.918,121.689c-36.655,0-66.475,29.82-66.475,66.475c0,36.655,29.82,66.475,66.475,66.475
                                                    c9.298,0,18.152-1.926,26.195-5.388c13.906-5.987,25.372-16.585,32.467-29.86c4.98-9.317,7.813-19.946,7.813-31.227
                                                    C166.393,151.51,136.573,121.689,99.918,121.689z"/>
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path d="M412.082,121.689c-36.655,0-66.475,29.82-66.475,66.475c0,11.282,2.833,21.911,7.813,31.227
                                                    c7.095,13.276,18.561,23.874,32.467,29.86c8.043,3.462,16.897,5.388,26.195,5.388c36.655,0,66.475-29.82,66.475-66.475
                                                    C478.557,151.509,448.737,121.689,412.082,121.689z"/>
                                            </g>
                                        </g>
                                        </svg>
                                   </span>
                                    <span class="ml-3 value">Mes employés</span>
                                    <span class="total">15</span>
                                </router-link>
                            </li>
                        </ul>
                    </div>
                    <div class="dashboard-group mb-5">
                        <div class="separator">SUPPORT</div>
                        <ul>
                            <li class="item mb-1">
                                <router-link :to="{name:'help'}" class="flex items-center">
                                   <span>
                                        <svg version="1.1" width="15px" height="15px" fill="currentColor" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                        viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                        <path d="m512 346.5c0-63.535156-36.449219-120.238281-91.039062-147.820312-1.695313 121.820312-100.460938 220.585937-222.28125 222.28125 27.582031 54.589843 84.285156 91.039062 147.820312 91.039062 29.789062 0 58.757812-7.933594 84.210938-23.007812l80.566406 22.285156-22.285156-80.566406c15.074218-25.453126 23.007812-54.421876 23.007812-84.210938zm0 0"/><path d="m391 195.5c0-107.800781-87.699219-195.5-195.5-195.5s-195.5 87.699219-195.5 195.5c0 35.132812 9.351562 69.339844 27.109375 99.371094l-26.390625 95.40625 95.410156-26.386719c30.03125 17.757813 64.238282 27.109375 99.371094 27.109375 107.800781 0 195.5-87.699219 195.5-195.5zm-225.5-45.5h-30c0-33.085938 26.914062-60 60-60s60 26.914062 60 60c0 16.792969-7.109375 32.933594-19.511719 44.277344l-25.488281 23.328125v23.394531h-30v-36.605469l35.234375-32.25c6.296875-5.761719 9.765625-13.625 9.765625-22.144531 0-16.542969-13.457031-30-30-30s-30 13.457031-30 30zm15 121h30v30h-30zm0 0"/></svg>
                                    </span>
                                    <span class="ml-3 value">Nous contacter</span>
                                </router-link>
                            </li>
                        </ul>
                    </div>
                    <div class="dashboard-group mb-5">
                        <div class="separator">COMPTE</div>
                        <ul>
                            <li class="item mb-1">
                                <router-link :to="{name:'settings'}" class="flex items-center">
                                   <span>
                                        <svg version="1.1" width="15px" height="15px" fill="currentColor" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                        viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                            <g>
                                                <g>
                                                    <path d="M256,181c-41.353,0-75,33.647-75,75c0,41.353,33.647,75,75,75c41.353,0,75-33.647,75-75C331,214.647,297.353,181,256,181z
                                                        "/>
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <path d="M512,298.305v-84.609l-69.408-13.667c-3.794-12.612-8.833-24.771-15.103-36.343l38.73-58.096l-59.81-59.81l-58.096,38.73
                                                        c-11.572-6.27-23.73-11.309-36.343-15.103L298.305,0h-84.609l-13.667,69.408c-12.612,3.794-24.771,8.833-36.343,15.103
                                                        L105.59,45.78l-59.81,59.81l38.73,58.096c-6.27,11.572-11.309,23.73-15.103,36.343L0,213.695v84.609l69.408,13.667
                                                        c3.794,12.612,8.833,24.771,15.103,36.343L45.78,406.41l59.81,59.81l58.096-38.73c11.572,6.27,23.73,11.309,36.343,15.103
                                                        L213.695,512h84.609l13.667-69.408c12.612-3.794,24.771-8.833,36.343-15.103l58.096,38.73l59.81-59.81l-38.73-58.096
                                                        c6.27-11.572,11.309-23.73,15.103-36.343L512,298.305z M256,361c-57.891,0-105-47.109-105-105s47.109-105,105-105
                                                        s105,47.109,105,105S313.891,361,256,361z"/>
                                                </g>
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="ml-3 value">Paramétres</span>
                                </router-link>
                            </li>
                            <li class="item mb-1">
                                <a href="/logout" class="flex items-center">
                                   <span>
                                        <svg version="1.1" width="15px" height="15px" fill="currentColor" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                viewBox="0 0 24.303 24.303" style="enable-background:new 0 0 24.303 24.303;" xml:space="preserve">
                                            <g>
                                                <path d="M10.269,11.298V1.883C10.269,0.844,11.113,0,12.152,0s1.883,0.844,1.883,1.883v9.415
                                                    c0,1.039-0.844,1.883-1.883,1.883S10.269,12.337,10.269,11.298z M19.616,2.761c-0.61-0.483-1.5-0.377-1.983,0.234
                                                    c-0.483,0.612-0.378,1.5,0.234,1.984c2.24,1.767,3.524,4.413,3.524,7.261c0,5.094-4.145,9.239-9.238,9.239
                                                    c-5.094,0-9.239-4.145-9.239-9.239c0-2.847,1.283-5.492,3.521-7.258c0.612-0.483,0.717-1.371,0.234-1.984
                                                    c-0.483-0.612-1.37-0.716-1.984-0.234C1.764,5.069,0.089,8.523,0.089,12.24c0,6.652,5.412,12.063,12.063,12.063
                                                    s12.063-5.412,12.063-12.063C24.215,8.521,22.538,5.067,19.616,2.761z"/>
                                            </g>
                                        </svg>
                                   </span>
                                    <span class="ml-3 value">Se déconnecter</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <router-view></router-view>
        </div>
    </div>
</template>

