<main>
	<!-- Banner -->
	<section class="relative pt-16 pb-32 flex content-center items-center justify-center" style="min-height: 75vh;">
		<div class="absolute top-0 w-full h-full bg-center bg-cover" style='background-image: url("https://i.ibb.co/qg1fkQb/bg-only-3.png");'>
			<span id="blackOverlay" class="w-full h-full absolute opacity-25 bg-black"></span>
		</div>
		<div class="container relative mx-auto">
			<div class="items-center flex flex-wrap">
				<div class="w-full lg:w-6/12 px-4 mx-auto text-center">
					<div class="flex flex-col justify-center items-center">
						<img class="w-1/2 object-contain" src="https://i.ibb.co/1LmvZGd/web3-icons.png">
						<h4 class="text-white font-semibold text-2xl">
							Dappmentors.org
						</h4>
						<p class="text-lg leading-relaxed mt-4 mb-4 text-gray-300">
							Enter, Learn, and Profit from Web 3.0 boom by building decentralized applications.
						</p>
						<a href="<?= BURL ?>register" class="bg-pink-600 text-white active:bg-gray-700 text-sm font-bold uppercase my-6 px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1" style="transition: all 0.15s ease 0s;">
							Let Me In!
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden" style="height: 70px;">
			<svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
				<polygon class="text-gray-300 fill-current" points="2560 0 2560 100 0 100"></polygon>
			</svg>
		</div>
	</section>

	<!-- Recent Tutorials -->
	<section class="pb-20 bg-gray-300 -mt-24">
		<div class="container mx-auto px-4">
			<div class="flex flex-wrap">
				<div class="lg:pt-12 pt-6 w-full md:w-4/12 px-4 text-center">
					<div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
						<div class="px-4 py-5 flex-auto">
							<div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-red-400">
								<i class="fas fa-book"></i>
							</div>
							<h6 class="text-xl font-semibold">Tutorials</h6>
							<p class="mt-2 mb-4 text-gray-600">
								Check out our free YouTube videos and blog tutorials to level up your
								Web3.0 application development skills.
							</p>
						</div>
					</div>
				</div>

				<div class="w-full md:w-4/12 px-4 text-center">
					<div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
						<div class="px-4 py-5 flex-auto">
							<div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-blue-400">
								<i class="fas fa-users"></i>
							</div>
							<h6 class="text-xl font-semibold">Membership</h6>
							<p class="mt-2 mb-4 text-gray-600">
								Join our Dapp Mentors Academy for access to rich learning content on
								building Dapps and other blockchain tricks and tips. Our stacks
								include React, NextJs, ReactNative, Solidity, and more!
							</p>
						</div>
					</div>
				</div>

				<div class="pt-6 w-full md:w-4/12 px-4 text-center">
					<div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
						<div class="px-4 py-5 flex-auto">
							<div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-green-400">
								<i class="fas fa-video"></i>
							</div>
							<h6 class="text-xl font-semibold">Private Session</h6>
							<p class="mt-2 mb-4 text-gray-600">
								Book a one-on-one session with me by connecting through the link at the
								bottom of the page to get help in resolving your unique problem.
								Would you like to schedule a call?
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="courses" class="relative py-15 mt-10">
		<div class="flex flex-wrap justify-center item-center my-2">
			<h2 class="text-3xl font-semibold leading-normal">
				Courses & Books
			</h2>
		</div>
		<p class="text-center mt-0 text-lg text-gray-900">
			Enroll in our courses and access a wide range of books to enhance your knowledge and skills.
		</p>
		<div class="flex justify-center items-center">
			<div class="swiper w-full mySwiper">
				<div class="swiper-wrapper py-5 mySwiper">
					<?php while ($row = $products->fetch_assoc()) : ?>
						<div class="swiper-slide justify-center items-center">
							<div class="max-w-sm bg-white rounded-lg overflow-hidden shadow-md shadow-gray-300 mt-2 mb-2 mx-2 dark:bg-white-800 dark:border-gray-900 text-gray-900 min-h-fit justify-between">
								<a href="<?= BURL ?>courses/details/<?= $row['slug'] ?>">
									<img class="w-full h-48 object-cover" src="<?= $row['image'] ?>" alt="product image" />
								</a>
								<div class="flex flex-col px-5 pb-5">
									<h5 class="text-lg font-semibold mt-3 <?= $row['category'] != 1 ? 'mb-3' : '' ?>"><?= $row['name'] ?></h5>
									<?php if ($row['category'] == 1) : ?>
										<span class="text-gray-600 font-semibold text-sm mb-3"><?= $row['lessons'] ?> Lessons</span>
									<?php endif; ?>
									<p class="pb-2">
										<?= substr(sanitize_text(revertext($row['description'])), 0, 100)
											.
											(strlen(sanitize_text(revertext($row['description']))) > 50 ?
												"..." : "") ?>
									</p>
									<div class="flex justify-start items-center text-sm font-semibold text-gray-600 space-x-4">
										<span><i class="fa fa-user"></i> <?= $row['instructor'] ?></span>
										<?php if ($row['category'] == 1) : ?>
											<span><i class="fa fa-clock"></i> <?= minutesToHumanReadableTime($row['duration']) ?></span>
										<?php endif; ?>
									</div>
									<div class="flex items-center py-2 justify-between">
										<span class="text-2xl font-bold text-gray-900 dark:text-gray-700">$<?= $row['price'] ?></span>
										<button onclick="checkout(`<?= $row['id'] ?>`, `<?= $row['price'] ?>`, `<?= $row['name'] ?>`, `<?= $row['image'] ?>`)" class="text-white bg-pink-600 hover:bg-pink-700 font-medium
												rounded-lg text-sm px-5 py-2.5 text-center">
											<?= $row['category'] == 1 ? 'Enroll Now' : 'Buy Now' ?>
										</button>
									</div>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
				</div>

				<div class="swiper-button-next rounded-full bg-white shadow-md p-5"></div>
				<div class="swiper-button-prev rounded-full bg-white shadow-md p-5"></div>
				<div class="swiper-pagination"></div>
			</div>
		</div>
	</section>

	<!-- Join Training Session -->
	<section class="pb-20 relative block bg-gray-900">
		<div class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden">
			<svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
				<polygon class="text-gray-900 fill-current" points="2560 0 2560 100 0 100"></polygon>
			</svg>
		</div>
		<div class="container mx-auto px-4 pt-24">
			<div class="flex flex-wrap text-center justify-center">
				<div class="w-full lg:w-6/12 px-4">
					<img class="w-1/2 object-contain mx-auto" src="https://i.ibb.co/1LmvZGd/web3-icons.png">
					<h2 class="text-4xl font-semibold text-white">Dapp Mentors Academy</h2>
					<p class="text-lg leading-relaxed mt-4 mb-4 text-gray-500">
						Dapp Mentors Academy is now live! Access a ton of our courses, books, and
						premium video content on Web3 development.
					</p>
					<a href="<?= BURL ?>membership" class="bg-pink-600 text-white active:bg-gray-700 text-sm font-bold uppercase my-6 px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1" style="transition: all 0.15s ease 0s;">
						Join Now!
					</a>
				</div>
			</div>
		</div>
	</section>

	<section id="courses" class="relative py-15 pb-20 mt-10">
		<div class="flex flex-wrap justify-center item-center my-2">
			<h2 class="text-3xl font-semibold leading-normal">
				Services and Partnership
			</h2>
		</div>
		<p class="text-center mt-0 text-lg text-gray-900">
			Book our listed services and explore partnership opportunities to achieve your goals.
		</p>
		<div class="flex justify-center items-center w-4/9">

			<div class="flex flex-wrap py-5 m-9 space-x-2 space-y-2">
				<?php while ($row = $services->fetch_assoc()) : ?>
					<div class="max-w-sm bg-white rounded-lg overflow-hidden shadow-md shadow-gray-300 mt-2 mb-2 mx-2 dark:bg-white-800 dark:border-gray-900 text-gray-900 min-h-fit justify-between">
						<a href="<?= BURL ?>courses/details/<?= $row['slug'] ?>">
							<img class="w-full h-48 object-cover" src="<?= $row['image'] ?>" alt="product image" />
						</a>
						<div class="flex flex-col px-5 pb-5">
							<h5 class="text-lg font-semibold my-3"><?= $row['name'] ?></h5>
							<p class="pb-2">
								<?= substr(sanitize_text(revertext($row['description'])), 0, 100)
									.
									(strlen(sanitize_text(revertext($row['description']))) > 50 ?
										"..." : "") ?>
							</p>
							<div class="flex items-center py-2 justify-between">
								<span class="text-2xl font-bold text-gray-900 dark:text-gray-700">$<?= $row['price'] ?></span>
								<button onclick="checkout(`<?= $row['id'] ?>`, `<?= $row['price'] ?>`, `<?= $row['name'] ?>`, `<?= $row['image'] ?>`)" class="text-white bg-pink-600 hover:bg-pink-700 font-medium
									rounded-lg text-sm px-5 py-2.5 text-center">
									Book Now
								</button>
							</div>
						</div>
					</div>

				<?php endwhile; ?>
			</div>

		</div>
	</section>

	<!-- Join Partnership -->
	<section class="pb-20 relative block bg-gray-900">
		<div class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden">
			<svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
				<polygon class="text-gray-900 fill-current" points="2560 0 2560 100 0 100"></polygon>
			</svg>
		</div>
		<div class="container mx-auto px-4 pt-24">
			<div class="flex flex-wrap text-center justify-center">
				<div class="w-full lg:w-6/12 px-4">
					<img class="w-1/2 object-contain mx-auto" src="https://i.ibb.co/1LmvZGd/web3-icons.png">
					<h2 class="text-4xl font-semibold text-white">Partnership</h2>
					<p class="text-lg leading-relaxed mt-4 mb-4 text-gray-500">
						Click the button below to partner with Dapp Mentors and collaborate with us.
						Let's build the future of blockchain technology together!
					</p>
					<a target="_blank" href="https://dappmentors.org/links/ztbiod" class="bg-pink-600 text-white active:bg-gray-700 text-sm font-bold uppercase my-6 px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1" style="transition: all 0.15s ease 0s;">
						Partner!
					</a>
				</div>
			</div>
		</div>
	</section>
</main>