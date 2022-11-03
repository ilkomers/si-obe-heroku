<x-createFaculties-layout>
  <div class="hero min-h-screen bg-base-100">
    <div class="hero-content text-center">
      <div class="max-w-xl">
        <div class="card w-96 bg-base-300 text-neutral-content">
            <div class="card-body items-center text-center">
              <h2 class="card-title">Tambah Fakultas</h2>
              <div class="form-control w-full max-w-xs">
                <label class="label">
                  <span class="label-text">Nama Fakultas</span>
                </label>
                <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" />
              </div>
              <div class="card-actions justify-end mt-4">
                  <button class="btn btn-outline btn-error">Cancel</button>
                  <button class="btn btn-primary">Tambah</button>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</x-createFaculties-layout>