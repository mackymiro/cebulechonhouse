<div >
<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">

<div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
  <div class="fixed inset-0 transition-opacity">

    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>

  </div>

  <!-- This element is to trick the browser into centering the modal contents. -->

  <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​



  <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">

  @if(session()->has('message'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative animate__animated animate__fadeIn" role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ session('message') }}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <title>Close</title>
                <path d="M6.293 6.293a1 1 0 011.414 0L10 8.586l2.293-2.293a1 1 0 111.414 1.414L11.414 10l2.293 2.293a1 1 0 11-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 01-1.414-1.414L8.586 10 6.293 7.707a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path>
            </svg>
        </span>
    </div>
    @endif
    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <h1>Are you sure you want to delete this?</h1>
    </div>

    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">

      <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">

        <button wire:click="confirmDeleteMeals('{{ $deleteId }}')" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
        Delete
        </button>

      </span>

      <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
        <button wire:click="closeModalDelete()" type="button" class="bg-green-500 text-white px-4 py-2 rounded-full ml-2">
              Cancel
        </button>

      </span>

    </div>

      

  </div>

</div>

</div>
</div>