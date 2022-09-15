<x-app-layout>
        <main class="p-6 sm:p-10 space-y-6">
          @if (session('status') == 'Unauthorize')
              <div class="fixed right-5 bottom-5 max-w-xs bg-red-400 text-sm text-white rounded-md shadow-lg mb-3 ml-3 animation" role="alert">
                <div class="flex p-4">
                  Vous n'êtes n'avez pas les droits !
                </div>
              </div>
          @endif
          <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-between">
            <div class="mr-6">
              <h1 class="text-4xl font-semibold mb-2">Tableau de bord</h1>
              <h2 class="text-gray-600 ml-0.5">Libre et vivant Photographie</h2>
            </div>
            <div class="flex flex-wrap items-start justify-end -mb-3">
              @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Bras-droit')
              <button class="inline-flex px-5 py-3 text-blue-600 hover:text-blue-700 focus:text-blue-700 hover:bg-blue-100 focus:bg-blue-100 border border-blue-600 rounded-md mb-3">
                <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="flex-shrink-0 h-5 w-5 -ml-1 mt-0.5 mr-2">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                </svg>
                Modération
              </button>
              @endif
              <a href="{{ route('images.index') }}" class="inline-flex px-5 py-3 text-white bg-blue-600 hover:bg-blue-700 focus:bg-blue-700 rounded-md ml-6 mb-3">
                <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="flex-shrink-0 h-6 w-6 text-white -ml-1 mr-2">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Publier une nouvelle photo !
              </a>
            </div>
          </div>
          <section class="grid md:grid-cols-2 xl:grid-cols-4 gap-6">
            <div class="flex items-center p-8 bg-white shadow rounded-lg">
              <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-blue-600 bg-blue-100 rounded-full mr-6">
                <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
              </div>
              <div>
                <span class="block text-2xl font-bold">238</span>
                <span class="block text-gray-500">Visites ce mois-ci</span>
              </div>
            </div>
            <div class="flex items-center p-8 bg-white shadow rounded-lg">
              <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-green-600 bg-green-100 rounded-full mr-6">
                <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                </svg>
              </div>
              <div>
                <span class="block text-2xl font-bold">6.8 <span class="text-xl text-gray-500 font-semibold">(+6%)</span></span>
                <span class="block text-gray-500">Différence</span>
              </div>
            </div>
            <div class="flex items-center p-8 bg-white shadow rounded-lg">
              <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-red-600 bg-red-100 rounded-full mr-6">
                <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6" />
                </svg>
              </div>
              <div>
                <span class="inline-block text-2xl font-bold">15 <span class="text-xl text-gray-500 font-semibold">(-14%)</span></span>
                <span class="block text-gray-500">Nombre de jour travaillé</span>
              </div>
            </div>
            <div class="flex items-center p-8 bg-white shadow rounded-lg">
              <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-blue-600 bg-blue-100 rounded-full mr-6">
                <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
              </div>
              <div>
                <span class="block text-2xl font-bold">83%</span>
                <span class="block text-gray-500">Taux d'overbooking</span>
              </div>
            </div>
          </section>
          <section class="grid md:grid-cols-2 xl:grid-cols-4 xl:grid-rows-3 xl:grid-flow-col gap-6">
            <div class="flex flex-col md:col-span-2 md:row-span-2 bg-white shadow rounded-lg">
              <div class="px-6 py-5 font-semibold border-b border-gray-100 mx-auto">Nombre de visite par mois</div>
              <div class="flex-grow">
                <chart-line></chart-line>
              </div>
            </div>
            <div class="flex items-center p-8 bg-white shadow rounded-lg">
              <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-yellow-600 bg-yellow-100 rounded-full mr-6">
                <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                  <path fill="#fff" d="M12 14l9-5-9-5-9 5 9 5z" />
                  <path fill="#fff" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                </svg>
              </div>
              <div>
                <span class="block text-2xl font-bold">{{ $online_count }}</span>
                <span class="block text-gray-500">Membre en ligne</span>
              </div>
            </div>
            <div class="flex items-center p-8 bg-white shadow rounded-lg">
              <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-teal-600 bg-teal-100 rounded-full mr-6">
                <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
              </div>
              <div>
                <span class="block text-2xl font-bold">XX</span>
                <span class="block text-gray-500">Publications postées</span>
              </div>
            </div>
            <div class="row-span-3 bg-white shadow rounded-lg">
              <div class="flex items-center justify-between px-6 py-5 font-semibold border-b border-gray-100">
                <span>Autres comptes actifs</span>
                <button type="button" class="inline-flex justify-center rounded-md px-1 -mr-1 bg-white text-sm leading-5 font-medium text-gray-500 hover:text-gray-600" id="options-menu" aria-haspopup="true" aria-expanded="true">
                  Tri
                  <svg class="-mr-1 ml-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                  </svg>
                </button>
                <!-- Refer here for full dropdown menu code: https://tailwindui.com/components/application-ui/elements/dropdowns -->
              </div>
              <div class="overflow-y-scroll" style="max-height: 38rem">
                <ul class="p-6 space-y-6">
                  @foreach ($dashboard_user as $user)
                    @if ($user['role'] != 'Guest')
                      <li class="flex items-center">
                        <div class="relative mr-3">
                          <img class="w-10 h-10 rounded-full" src="https://randomuser.me/api/portraits/women/82.jpg" alt="Annette Watson profile picture">
                          @if ($user['is_online'] == TRUE)
                            <div class="top-0 left-7 absolute w-3.5 h-3.5 bg-green-400 border-2 border-white dark:border-gray-800 rounded-full"></div>
                          @else
                            <div class="top-0 left-7 absolute w-3.5 h-3.5 bg-red-400 border-2 border-white dark:border-gray-800 rounded-full"></div>
                          @endif
                        </div>
                        <span class="text-gray-600">{{ $user['name'] }}</span>
                        <span class="ml-auto font-semibold">{{ $user['role'] }}</span>
                      </li>
                    @endif
                  @endforeach
                </ul>
              </div>
            </div>
            <div class="flex flex-col row-span-3 bg-white shadow rounded-lg">
              <div class="px-6 py-5 font-semibold border-b border-gray-100">Prochains rdv</div>
              <div class="p-4 flex-grow">
                <div class="col-span-12 xl:col-span-4 2xl:col-span-3">
                  <div class="box intro-y">
                    <button class="flex px-5 py-3 text-white bg-blue-600 hover:bg-blue-700 focus:bg-blue-700 rounded-md w-full justify-center">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="edit-3" class="lucide lucide-edit-3 w-4 h-4 mr-2" data-lucide="edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                      Ajouter un RDV
                    </button>
                      <div class="border-t dark:border-darkmode-400 mt-6 mb-5 py-3" id="calendar-events">
                          <div class="relative">
                              <div class="event p-3 -mx-3 cursor-pointer transition duration-300 ease-in-out hover:bg-slate-100 dark:hover:bg-darkmode-400 rounded-md flex items-center">
                                  <div class="w-2 h-2 bg-pending rounded-full mr-3 bg-green-500"></div>
                                  <div class="pr-10">
                                      <div class="event__title truncate">VueJS Amsterdam</div>
                                      <div class="text-slate-500 text-xs mt-0.5">
                                          <span class="event__days">2</span> Jours <span class="mx-1">•</span> 10:00
                                      </div>
                                  </div>
                              </div>
                              <a class="flex items-center absolute top-0 bottom-0 my-auto right-0" href="">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="edit" data-lucide="edit" class="lucide lucide-edit w-4 h-4 text-slate-500"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                              </a>
                          </div>
                          <div class="relative">
                              <div class="event p-3 -mx-3 orange cursor-pointer transition duration-300 ease-in-out hover:bg-slate-100 dark:hover:bg-darkmode-400 rounded-md flex items-center">
                                  <div class="w-2 h-2 bg-orange-500 rounded-full mr-3"></div>
                                  <div class="pr-10">
                                      <div class="event__title truncate">Vue Fes Japan 2019</div>
                                      <div class="text-slate-500 text-xs mt-0.5">
                                          <span class="event__days">3</span> Jours <span class="mx-1">•</span> 07:00
                                      </div>
                                  </div>
                              </div>
                              <a class="flex items-center absolute top-0 bottom-0 my-auto right-0" href="">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="edit" data-lucide="edit" class="lucide lucide-edit w-4 h-4 text-slate-500"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                              </a>
                          </div>
                          <div class="relative">
                              <div class="event p-3 -mx-3 cursor-pointer transition duration-300 ease-in-out hover:bg-slate-100 dark:hover:bg-darkmode-400 rounded-md flex items-center">
                                  <div class="w-2 h-2 bg-pending rounded-full mr-3 bg-green-500"></div>
                                  <div class="pr-10">
                                      <div class="event__title truncate">Laracon 2021</div>
                                      <div class="text-slate-500 text-xs mt-0.5">
                                          <span class="event__days">4</span> Jours <span class="mx-1">•</span> 11:00
                                      </div>
                                  </div>
                              </div>
                              <a class="flex items-center absolute top-0 bottom-0 my-auto right-0" href="">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="edit" data-lucide="edit" class="lucide lucide-edit w-4 h-4 text-slate-500"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                              </a>
                          </div>
                      </div>
                  </div>
              </div>
              </div>
            </div>
          </section>
        </main>
      </div>
</x-app-layout>
