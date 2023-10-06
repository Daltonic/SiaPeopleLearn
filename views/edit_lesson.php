<main>
	<section class="relative flex content-center w-full items-center justify-center h-20">
		<div class="absolute w-full h-full">
			<img src="https://i.ibb.co/qg1fkQb/bg-only-3.png" class="relative top-0 w-full h-full bg-center object-cover object-center" alt="">
			<span id="blackOverlay" class="lg:w-fit w-fit h-full absolute opacity-25 bg-black"></span>
		</div>
	</section>
	<section class="relative py-10 flex content-center bg-gray-300 items-center justify-center">
		<div class="w-full lg:w-6/12 my-6 px-4">
			<div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-white border-0">
				<div class="rounded-t mb-0 px-6 py-6">
					<div class="text-center mb-3">
						<h6 class="text-gray-600 text-md font-bold mb-2">
							Edit Lesson
						</h6>
						<?= $this->alert->get() ?>
					</div>
				</div>
				<input type="hidden" id="burl" value="<?= BURL ?>">
				<div class="flex-auto px-4 lg:px-10 py-10 pt-0">
					<form method="post" action="<?= BURL ?>lessons/update_lesson/<?= $product_id ?>/<?= $lesson_id ?>" enctype="multipart/form-data">
						<div class="relative w-full mb-3">
							<label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="grid-name">Name</label>
							<input value="<?= $lesson['name'] ?>" type="text" name="name" class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" placeholder="Name" style="transition: all 0.15s ease 0s;" />
						</div>
						<div class="relative w-full mb-3">
							<label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="grid-image">Video</label>
							<input value="<?= $lesson['video'] ?>" type="text" name="video" class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" placeholder="Video URL" style="transition: all 0.15s ease 0s;" />
						</div>
						<div class="relative w-full mb-3">
							<label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="grid-duration">Duration</label>
							<input value="<?= $lesson['duration'] ?>" type="number-float" name="duration" class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" placeholder="Duration (mins)" min="1.00" step="1.00" style="transition: all 0.15s ease 0s;" />
							<input value="<?= $lesson['duration'] ?>" type="hidden" name="old_duration" />
						</div>
						<div class="relative w-full mb-3">
							<label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="grid-description">Description</label>
							<input value="<?= $lesson['description'] ?>" type="text" name="description" class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" placeholder="Description" style="transition: all 0.15s ease 0s;" />
						</div>
						<div class="text-center mt-6">
							<button class="bg-gray-900 text-white active:bg-gray-700 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full" type="submit" name="<?= $this->token ?>">UPDATE</button>
						</div>
					</form>
					<a class="text-center" href="<?= BURL ?>lessons/<?= $product_id ?>">Back to Lessons</a>
				</div>
			</div>
		</div>
	</section>
</main>