<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body>

    <!-- source: https://gist.github.com/nraloux/bce10c4148380061781b928cdab9b193 -->
<!-- I have added support for dark mode and improved UI -->

<div class="h-full bg-gray-400 dark:bg-gray-900">
	<!-- Container -->
	<div class="mx-auto">
		<div class="flex justify-center px-6 py-12">
			<!-- Row -->
			<div class="w-full xl:w-3/4 lg:w-11/12 flex">
				<!-- Col -->
				<div class="w-full h-auto bg-gray-400 dark:bg-gray-800 hidden lg:block lg:w-5/12 bg-cover rounded-l-lg"
					style="background-image: url('https://img.freepik.com/free-vector/mail-sent-concept-illustration_114360-248.jpg?ga=GA1.1.515628102.1729593033&semt=ais_hybrid')"></div>
				<!-- Col -->
				<div class="w-full lg:w-7/12 bg-white dark:bg-gray-700 p-5 rounded-lg lg:rounded-l-none">
					<h3 class="py-4 text-2xl text-center text-gray-800 dark:text-white">Connexion</h3>
					<form class="px-8 pt-6 pb-8 mb-4 bg-white dark:bg-gray-800 rounded">
                        

						<div class="mb-4">
							<label class="block mb-2 text-sm font-bold text-gray-700 dark:text-white" for="email">
                                e-mail
                            </label>
							<input
                                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 dark:text-white border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                id="e-mail"
                                type="email"
                                placeholder="entrer votre e-mail"
                                name="email"
                            />

                            <label class="block mb-2 text-sm font-bold text-gray-700 dark:text-white mt-4" for="password">
                                password
                            </label>
                            <input
                            class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 dark:text-white border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                            id="password"
                            type="password"
                            placeholder="entrer votre password"
                            name="password"
                        />
						</div>


						<div class="mb-6 text-center">
							<button
                                class="mt-10 w-full px-4 py-2 font-bold text-white bg-red-400 rounded-full hover:bg-red-200 dark-bg-red-400 dark:text-white dark:hover:bg-red-200 focus:outline-none focus:shadow-outline"
                                type="button"
                            >
                            Connectez-vous
                            </button>
						</div>
						<hr class="mb-6 border-t" />
						<div class="text-center">
							<a class="inline-block text-sm text-blue-500 dark:text-blue-500 align-baseline hover:text-blue-800"
								href="./index.html">
								Vous n'avez pas de compte ? Inscrivez-vous !
							</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

</body>
</html>