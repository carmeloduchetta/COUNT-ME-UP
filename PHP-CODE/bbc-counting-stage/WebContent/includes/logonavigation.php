	<!-- Special styles for these pages only -->
	<style>
		.logo-area
			{
				width: 83px;
				height: 45px;
				margin: 7px 12px 1px 12px;
			}
		.logo-area svg
			{
				width: 100%;
				height: 45px;
			}
	</style>	
	
	<!-- Navigation in the horizontal top section -->
	<?php $navclass=""; ?>
	<div id="navigator" role="head">
		<div class="left">
			<div class="logo-area">
				<!--  <svg class="colliers-logo-alt" viewBox="0 0 61 23" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
				    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
				        <path d="M21.4272,6.9758 C22.3542,7.9048 22.7922,8.9338 22.7922,10.0978 C22.7922,11.2078 22.3142,12.2748 21.5642,13.1038 C20.7542,14.0128 19.5682,14.5268 18.2462,14.5268 C16.9982,14.5268 15.9322,14.1688 15.0432,13.1038 C14.1732,12.0748 13.9742,11.2458 13.9742,10.0398 C13.9742,9.0908 14.4512,7.7078 15.6342,6.7588 C16.6042,5.9658 17.6342,5.8088 18.4392,5.8088 C19.7652,5.8088 20.7542,6.3258 21.4272,6.9758 L21.4272,6.9758 Z M20.3792,10.0398 C20.3792,7.8638 19.2322,6.5968 18.3212,6.5968 C17.8092,6.5968 17.4142,6.7588 17.0782,7.1368 C16.4642,7.8278 16.2272,8.6558 16.2272,10.0978 C16.2272,11.2458 16.3072,11.9968 16.8422,12.8438 C17.1772,13.3808 17.6132,13.6978 18.4012,13.6978 C19.7062,13.6978 20.3792,12.0558 20.3792,10.0398 L20.3792,10.0398 Z M40.9481,9.9023 C40.9481,11.9193 42.3901,13.1043 43.5161,13.1043 C44.7421,13.1043 45.4911,12.5873 45.9091,11.9573 C45.9891,11.8193 46.0671,11.8193 46.1481,11.8593 L46.4411,12.0353 C46.5411,12.0933 46.5801,12.1743 46.4411,12.4303 C46.0261,13.1833 45.0181,14.5273 42.8461,14.5273 C41.5801,14.5273 40.6901,14.2513 39.9991,13.4623 C39.0901,12.4113 38.8901,11.4243 38.8901,10.1993 C38.8901,9.1153 39.0131,8.3793 39.8611,7.2713 C40.6901,6.2063 41.5801,5.8083 43.3001,5.8083 C45.5541,5.8083 46.2861,8.1623 46.2861,8.9753 C46.2861,9.2703 46.0871,9.2903 45.7301,9.2903 L40.9481,9.2903 L40.9481,9.9023 L40.9481,9.9023 Z M43.3981,8.5773 C43.8121,8.5773 44.0511,8.4593 44.0511,8.3003 C44.0511,7.7083 43.8541,6.5423 42.8261,6.5423 C41.8561,6.5423 41.2621,7.2543 41.0071,8.5773 L43.3981,8.5773 L43.3981,8.5773 Z M48.6331,9.2112 C48.6331,8.3012 48.4771,7.9862 47.8831,7.6692 L47.5281,7.4712 C47.4121,7.4302 47.3721,7.3922 47.3721,7.3102 L47.3721,7.1932 C47.3721,7.1152 47.4121,7.0762 47.5281,7.0152 L49.9191,5.8882 C50.0391,5.8502 50.1171,5.8082 50.2361,5.8082 C50.3551,5.8082 50.3921,5.9302 50.4151,6.0492 L50.5911,7.4712 L50.6711,7.4712 C51.3431,6.3642 52.1741,5.6902 53.0421,5.6902 C53.6751,5.6902 54.0701,6.1292 54.0701,6.6802 C54.0701,7.2352 53.5161,7.7472 53.0031,7.7472 C52.7251,7.7472 52.4891,7.6692 52.3301,7.5912 C52.1741,7.4712 51.9761,7.4302 51.7781,7.4302 C51.5421,7.4302 51.1871,7.5912 50.9481,8.0052 C50.7911,8.2822 50.7101,8.7132 50.7101,8.9752 L50.7101,12.7872 C50.7101,13.4192 50.8691,13.6182 51.2641,13.6182 L52.1361,13.6182 C52.2521,13.6182 52.2921,13.6562 52.2921,13.7532 L52.2921,14.2122 C52.2921,14.3102 52.2521,14.3502 52.1531,14.3502 C52.0151,14.3502 51.1451,14.2902 49.7011,14.2902 C48.3191,14.2902 47.5491,14.3502 47.3911,14.3502 C47.2911,14.3502 47.2511,14.3102 47.2511,14.2122 L47.2511,13.7782 C47.2511,13.6562 47.2911,13.6182 47.4271,13.6182 L48.1221,13.6182 C48.4371,13.6182 48.6331,13.4622 48.6331,13.0842 L48.6331,9.2112 L48.6331,9.2112 Z M54.6827,11.8016 C54.6627,11.7216 54.6827,11.6606 54.7397,11.6406 L55.1167,11.5246 C55.1967,11.5036 55.2547,11.5036 55.2947,11.5836 L55.9457,12.6896 C56.3037,13.2856 56.6787,13.7536 57.6477,13.7536 C58.4187,13.7536 59.0497,13.2856 59.0497,12.5496 C59.0497,11.7596 58.5357,11.4016 57.1537,11.0086 C55.8087,10.6146 54.7397,9.9416 54.7397,8.5366 C54.7397,7.6696 55.0567,6.9576 55.7487,6.4616 C56.4407,5.9896 56.9947,5.8086 57.8037,5.8086 C58.7727,5.8086 59.3657,6.0486 59.7237,6.2446 C60.0177,6.4006 60.0767,6.4826 60.0957,6.5966 L60.3567,7.9446 C60.3737,8.0236 60.3737,8.1216 60.3357,8.1616 L59.9587,8.3396 C59.9017,8.3586 59.8397,8.3396 59.8017,8.2586 L58.8507,7.1926 C58.6137,6.9356 58.2577,6.5826 57.6077,6.5826 C56.8757,6.5826 56.2427,7.0156 56.2427,7.7086 C56.2427,8.5186 56.8367,8.7586 58.0217,9.0706 C58.9327,9.3056 59.4867,9.5446 59.9997,10.0976 C60.4347,10.5326 60.5907,11.0086 60.5907,11.6816 C60.5907,13.3406 59.2467,14.5266 57.2927,14.5266 C56.2427,14.5266 55.3747,14.1906 55.1537,14.0136 C55.0767,13.9316 55.0197,13.8746 54.9977,13.7976 L54.6827,11.8016 L54.6827,11.8016 Z M38.05,13.618 L37.259,13.618 C37.06,13.618 36.981,13.462 36.943,13.104 C36.901,12.867 36.901,12.153 36.901,11.402 L36.901,9.27 C36.901,7.629 36.901,6.364 36.943,6.049 C36.962,5.888 36.901,5.809 36.783,5.809 C36.666,5.809 36.508,5.85 36.309,5.93 C35.971,6.066 34.017,6.759 33.74,6.877 C33.64,6.917 33.6,6.957 33.6,7.035 L33.6,7.254 C33.6,7.33 33.62,7.392 33.799,7.43 C34.708,7.67 34.828,8.064 34.828,8.656 L34.828,11.445 C34.828,11.996 34.808,12.629 34.787,13.222 C34.767,13.541 34.668,13.618 34.472,13.618 C34.472,13.618 34.33,13.647 33.493,13.647 C32.65,13.647 32.425,13.618 32.425,13.618 C31.992,13.618 31.954,13.341 31.913,12.983 C31.874,12.392 31.874,10.377 31.874,9.468 L31.874,6.619 C31.874,5.533 31.913,1.42 31.954,0.355 C31.954,0.078 31.874,-8.8817842e-16 31.756,-8.8817842e-16 C31.675,-8.8817842e-16 31.559,0.037 31.322,0.117 C30.688,0.513 29.147,1.026 28.358,1.265 C28.235,1.303 28.199,1.381 28.199,1.42 L28.199,1.657 C28.199,1.74 28.199,1.777 28.318,1.82 L28.712,1.936 C29.344,2.134 29.681,2.451 29.72,3.122 C29.758,3.636 29.8,5.335 29.8,6.719 L29.8,12.908 C29.8,13.462 29.501,13.618 29.306,13.618 C29.306,13.618 29.009,13.647 28.284,13.647 C27.559,13.647 27.276,13.618 27.276,13.618 C26.839,13.618 26.798,13.341 26.759,12.983 C26.719,12.392 26.719,10.377 26.719,9.468 L26.719,6.619 C26.719,5.533 26.759,1.42 26.798,0.355 C26.798,0.078 26.719,-8.8817842e-16 26.603,-8.8817842e-16 C26.524,-8.8817842e-16 26.406,0.037 26.167,0.117 C25.533,0.513 23.994,1.026 23.203,1.265 C23.084,1.303 23.044,1.381 23.044,1.42 L23.044,1.657 C23.044,1.74 23.044,1.777 23.165,1.82 L23.559,1.936 C24.191,2.134 24.526,2.451 24.567,3.122 C24.608,3.636 24.646,5.335 24.646,6.719 L24.646,12.908 C24.646,13.462 24.351,13.618 24.152,13.618 L23.4,13.618 C23.165,13.618 23.125,13.657 23.125,13.779 L23.125,14.153 C23.125,14.27 23.165,14.35 23.283,14.35 C23.362,14.35 27.151,14.314 30.879,14.314 C34.475,14.314 38.011,14.35 38.089,14.35 C38.208,14.35 38.248,14.27 38.248,14.153 L38.248,13.754 C38.248,13.657 38.208,13.618 38.05,13.618 L38.05,13.618 Z M12.905,11.4508 C12.776,11.3288 12.547,11.1258 12.532,11.1058 C12.509,11.0818 12.44,11.1018 12.42,11.1278 C11.542,12.2418 9.908,13.2048 7.867,13.2048 C6.918,13.2048 5.771,13.0448 4.469,11.6608 C3.005,10.0788 2.648,7.7478 2.648,6.5218 C2.648,3.6788 3.954,0.8308 7.114,0.8308 C8.659,0.8308 9.687,1.4618 10.556,2.2928 C11.384,3.1598 11.86,4.1488 12.098,4.8598 C12.156,5.0188 12.216,5.0978 12.313,5.0598 L12.689,4.9408 C12.769,4.9208 12.789,4.8598 12.769,4.7398 C12.689,4.1488 12.294,0.9878 12.294,0.6348 C12.294,0.3558 12.255,0.3158 12.016,0.3158 C11.78,0.3158 11.739,0.3158 11.702,0.4378 L11.542,0.9488 C11.504,1.1048 11.424,1.1048 11.147,0.9488 C10.437,0.5568 8.974,0.0008 7.155,0.0008 C4.784,0.0008 3.084,0.9488 2.016,2.0958 C0.632,3.5988 0,5.4558 0,7.3918 C0,9.1318 0.673,11.4238 2.134,12.7298 C3.363,13.8358 4.784,14.5878 7.315,14.5878 C9.917,14.5878 11.734,13.1928 12.932,11.6368 C12.955,11.6048 12.963,11.5038 12.905,11.4508 L12.905,11.4508 Z M36.8343,3.2685 C36.8343,3.9325 36.2953,4.4725 35.6283,4.4725 C34.9613,4.4725 34.4233,3.9325 34.4233,3.2685 C34.4233,2.6035 34.9613,2.0615 35.6283,2.0615 C36.2953,2.0615 36.8343,2.6035 36.8343,3.2685 L36.8343,3.2685 Z M0.8311,17.8454 L1.4891,17.8454 L1.4891,22.2784 L0.8311,22.2784 L0.8311,17.8454 L0.8311,17.8454 Z M6.925,22.2788 L6.498,22.2788 L3.885,18.9598 L3.885,22.2788 L3.238,22.2788 L3.238,17.8458 L3.82,17.8458 L6.367,21.0868 L6.367,17.9358 L6.367,17.8458 L7.015,17.8458 L7.015,22.2788 L6.925,22.2788 L6.925,22.2788 Z M9.8445,22.2791 L9.8445,18.4681 L8.4165,18.4681 L8.4165,17.8461 L11.9375,17.8461 L11.9375,18.4681 L10.5095,18.4681 L10.5095,22.1901 L10.5095,22.2791 L9.8445,22.2791 L9.8445,22.2791 Z M13.3393,22.2788 L13.3393,17.8458 L16.5943,17.8458 L16.5943,17.9358 L16.5943,18.3728 L16.5943,18.4618 L13.9983,18.4618 L13.9983,19.7358 L16.3203,19.7358 L16.3203,20.3528 L13.9983,20.3528 L13.9983,21.6628 L16.6243,21.6628 L16.6243,22.2788 L13.3393,22.2788 L13.3393,22.2788 Z M26.8557,22.2791 L26.4287,22.2791 L23.8147,18.9591 L23.8147,22.2791 L23.1687,22.2791 L23.1687,17.8461 L23.7517,17.8461 L26.2977,21.0861 L26.2977,17.9361 L26.2977,17.8461 L26.9447,17.8461 L26.9447,22.2791 L26.8557,22.2791 L26.8557,22.2791 Z M29.6981,20.5446 L31.3621,20.5446 L30.5331,18.6826 L29.6981,20.5446 L29.6981,20.5446 Z M32.1281,22.2786 L31.6301,21.1546 L29.4301,21.1546 L28.9261,22.2786 L28.2371,22.2786 L30.2571,17.8156 L30.8211,17.8156 L32.8411,22.2786 L32.1281,22.2786 L32.1281,22.2786 Z M34.7099,22.2788 L34.7099,18.4688 L33.2819,18.4688 L33.2819,17.8458 L36.8039,17.8458 L36.8039,18.4688 L35.3749,18.4678 L35.3749,22.1898 L35.3749,22.2788 L34.7099,22.2788 L34.7099,22.2788 Z M38.2481,17.8454 L38.9071,17.8454 L38.9071,22.2784 L38.2481,22.2784 L38.2481,17.8454 L38.2481,17.8454 Z M50.1896,22.2784 L49.7626,22.2784 L47.1486,18.9594 L47.1486,22.2784 L46.5016,22.2784 L46.5016,17.8464 L47.0846,17.8464 L49.6316,21.0864 L49.6316,17.9354 L49.6316,17.8464 L50.2786,17.8464 L50.2786,22.2784 L50.1896,22.2784 L50.1896,22.2784 Z M53.0315,20.5446 L54.6955,20.5446 L53.8665,18.6826 L53.0315,20.5446 L53.0315,20.5446 Z M55.4615,22.2786 L54.9635,21.1546 L52.7635,21.1546 L52.2595,22.2786 L51.5705,22.2786 L53.5905,17.8156 L54.1555,17.8156 L56.1745,22.2786 L55.4615,22.2786 L55.4615,22.2786 Z M57.4668,22.2791 L57.4668,17.9361 L57.4668,17.8461 L58.1258,17.8461 L58.1258,21.6571 L60.5208,21.6571 L60.5208,22.2791 L57.4668,22.2791 L57.4668,22.2791 Z M20.5504,20.5098 C21.1764,20.3548 21.6424,19.9118 21.6394,19.2058 C21.6374,18.3848 20.9774,17.8468 20.0114,17.8458 L18.0934,17.8458 L18.0934,22.2788 L18.7514,22.2788 L18.7514,20.6258 L19.8324,20.6258 L21.0664,22.2788 L21.8804,22.2788 L20.5504,20.5098 L20.5504,20.5098 Z M19.9694,20.0158 L18.7514,20.0158 L18.7514,18.4688 L19.9754,18.4688 C20.6394,18.4778 20.9684,18.7508 20.9744,19.2238 C20.9714,19.7178 20.5814,20.0088 19.9694,20.0158 L19.9694,20.0158 Z M42.7316,17.7727 C41.3866,17.7757 40.4686,18.8457 40.4666,20.0687 C40.4686,21.2907 41.3736,22.3497 42.7196,22.3517 C44.0646,22.3497 44.9816,21.2797 44.9846,20.0567 C44.9816,18.8337 44.0766,17.7757 42.7316,17.7727 L42.7316,17.7727 Z M42.7316,21.7297 C41.8106,21.7287 41.1456,20.9857 41.1436,20.0567 C41.1466,19.1257 41.7986,18.3967 42.7196,18.3957 C43.6396,18.3957 44.3056,19.1387 44.3076,20.0687 C44.3046,20.9987 43.6526,21.7277 42.7316,21.7297 L42.7316,21.7297 Z" fill="#00467F"></path>
				    </g>
				</svg>		-->	
			</div>
		</div>
	</div>