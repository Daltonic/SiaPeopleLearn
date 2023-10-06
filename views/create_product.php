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
							Create Product
						</h6>
						<?= $this->alert->get() ?>
					</div>
				</div>
				<input type="hidden" id="burl" value="<?= BURL ?>">
				<div class="flex-auto px-4 lg:px-10 py-10 pt-0">
					<form method="post" action="<?= BURL ?>administration/create_product" enctype="multipart/form-data">
						<div class="relative w-full mb-3">
							<label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="grid-name">Name</label><input type="text" name="name" class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" placeholder="Name Of Course" style="transition: all 0.15s ease 0s;" />
						</div>
						<div class="relative w-full mb-3">
							<label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="grid-category">Select A Category</label>
							<select name="category" id="" class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full">
								<option value="" selected disabled hidden>Choose A Category!</option>
								<option value="1">Course</option>
								<option value="2">Books</option>
								<option value="4">Service</option>
							</select>

						</div>
						<div class="relative w-full mb-3">
							<label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="grid-image">Image</label><input type="text" name="image" class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" placeholder="Course Image" style="transition: all 0.15s ease 0s;" />
						</div>
						<div class="relative w-full mb-3">
							<label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="grid-price">Price</label><input type="text" name="price" class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" placeholder="Course Price" style="transition: all 0.15s ease 0s;" />
						</div>

						<div class="relative w-full mb-3">
							<label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="grid-instructor">Instructor</label><input type="text" name="instructor" class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" placeholder="Course Instructor" style="transition: all 0.15s ease 0s;" />
						</div>

						<div class="relative w-full mb-3">
							<label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="grid-description">Description</label>
							<textarea id="editor" name="description" class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" placeholder="Course Description" style="transition: all 0.15s ease 0s;"></textarea>
						</div>

						<div class="text-center mt-6">
							<button class="bg-gray-900 text-white active:bg-gray-700 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full" type="submit" name="<?= $this->token ?>">POST</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
</main>