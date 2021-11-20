<?php

class notification
{

    function __construct()
    {

    }

    private function successMessage(string $success): string
    {
        return '
            <script>setTimeout(function(){document.getElementById("success").classList.add("opacity-0")},6000);setTimeout(function(){document.getElementById("success").classList.add("hidden")},7000);</script>
                <div id="success" class=" duration-1000 transition-opacity fixed top-0 right-0 mt-5 mr-5 flex w-full max-w-sm overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <div class="flex items-center justify-center w-12 bg-green-500">
                        <i class="fas fa-check-circle"></i>
                    </div>

                    <div class="px-4 py-2 pb-5 -mx-3">
                        <div class="mx-3">
                            <span class="font-semibold text-green-500 dark:text-green-400">Gelukt!</span>
                            <p class="text-sm text-gray-600 dark:text-gray-200">' . $success . '</p>
						</div>
					</div>
				</div>
        ';
    }

    private function errorMessage(string $error): string
    {
        return '
            <script>setTimeout(function(){document.getElementById("error").classList.add("opacity-0")},6000);setTimeout(function(){document.getElementById("error").classList.add("hidden")},7000);</script>
                <div id="error" class=" duration-1000 transition-opacity fixed top-0 right-0 mt-5 mr-5 flex w-full max-w-sm overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <div class="flex items-center justify-center w-12 bg-red-500">
                        <i class="fas fa-exclamation"></i>
                    </div>

                    <div class="px-4 py-2 pb-5 -mx-3">
                        <div class="mx-3">
                            <span class="font-semibold text-red-500 dark:text-red-400">Oeps!</span>
                            <p class="text-sm text-gray-600 dark:text-gray-200">' . $error . '</p>
						</div>
					</div>
				</div>
        ';
    }

    public function createError(string $message, $type)
    {
        switch ($type) {
            case true:
                return $this->successMessage($message);
                break;
            default:
                return $this->errorMessage($message);
                break;
        }
    }
}