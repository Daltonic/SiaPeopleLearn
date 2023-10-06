<main>
	<section class="relative flex content-center w-full items-center justify-center h-20">
		<div class="absolute w-full h-full">
			<img src="https://i.ibb.co/qg1fkQb/bg-only-3.png" class="relative top-0 w-full h-full bg-center object-cover object-center" alt="">
			<span id="blackOverlay" class="lg:w-fit w-fit h-full absolute opacity-25 bg-black"></span>
		</div>
	</section>
	<section class="h-screen py-10 flex content-center bg-gray-300 items-center justify-center">
		<div class="w-full lg:w-6/12 px-4">
			<div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-white border-0">
				<div class="rounded-t mb-0 px-6 py-6">
					<div class="text-center mb-3">
						<h6 class="text-gray-600 text-md font-bold mb-2">
							Upload Product Assets
						</h6>
						<?= $this->alert->get() ?>
					</div>
				</div>
				<input type="hidden" id="burl" value="<?= BURL ?>">
				<div class="flex-auto px-4 lg:px-10 py-10 pt-0">
					<form method="post" action="<?= BURL ?>downloads/upload_asset/<?= $product_id ?>" enctype="multipart/form-data">
						<div class="relative w-full mb-3">
							<label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="file-upload">Upload File</label>
							<input type="file" name="asset" id="file-upload" accept=".pdf, .zip, .rar" class="hidden" onchange="updateFileName(this)" />

							<div class="flex">
								<input type="text" id="file-name" class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded-l text-sm shadow focus:outline-none focus:ring w-full" placeholder="Choose a file..." <?= $row['url'] != '' ? 'value="' . $row['url'] . '"' : 'value=""' ?> readonly />
								<label for="file-upload" class="cursor-pointer bg-pink-600 text-white py-3 px-4 rounded-r hover:bg-pink-700">
									Browse
								</label>
							</div>
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