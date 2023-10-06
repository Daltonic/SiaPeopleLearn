<div class="fixed top-0 left-0 w-screen h-screen flex items-center justify-center
    bg-black bg-opacity-50 transform z-50 transition-transform duration-300 scale-0" id="message-modal">
    <div class="bg-white rounded-xl w-11/12 md:w-4/5 h-9/12 p-6">
        <div class="flex flex-col">
            <div class="flex flex-row justify-between items-center">
                <p class="font-semibold">Message</p>
                <button id="closeBtn" class="border-0 bg-transparent focus:outline-none">
                    <i class="fa fa-times text-black"></i>
                </button>
            </div>

            <form method="POST" action="<?= BURL ?>management/message" class="flex flex-col justify-center items-start rounded-xl my-5 space-y-3">
                <input name="emails" type="hidden" id="email-list">
                <div class="relative w-full mb-3">
                    <input type="text" name="subject" class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" placeholder="Message Subject" style="transition: all 0.15s ease 0s;" />
                </div>
                <div class="relative w-full mb-3">
                    <textarea id="editor" name="message" class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" placeholder="Type your message..." style="transition: all 0.15s ease 0s;"></textarea>
                </div>

                <button class="text-sm bg-pink-600 rounded-full block w-full p-4 text-white
                    right-2 sm:right-10 hover:bg-pink-700 transition-colors duration-300">
                    Send Message
                </button>
            </form>
        </div>
    </div>
</div>