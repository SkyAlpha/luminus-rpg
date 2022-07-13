
<template>
  <div class="w-full block">
    <div class="container mx-auto bg-gray-300 mt-10 border rounded-lg shadow-md">

      <div v-for="dialogue in dialogues" :key="dialogue.id" class="m-5">
        <div class="w-4/12 ml-5">
          <h2 for="" class="block text-gray-800 text-lg font-bold mb-2 underline text-cyan-800">Dialogue #{{dialogue.id}}</h2>
          <label for="" class="block text-gray-700 text-md font-bold mb-2">Dialogue Name</label>
          <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
           type="text" v-model="dialogue.name">
        </div>
        <div v-for="chat in dialogue.chat" :key="chat.dialogue_id" class="flex justify-evenly bg-slate-200 border rounded-md m-5 shadow-lg">
          <div class="m-5 bg-zinc-100 border rounded-md p-3 shadow-md">
            <label class="mr-2 text-gray-700 text-sm font-bold mb-2">Is Left Talking</label><input class="mb-5" type="checkbox" v-model="chat.left">
            <label class="block text-gray-700 text-sm font-bold mb-2">Left Character Name</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-5" 
            type="text" v-model="chat.leftName">
            <label class="block text-gray-700 text-sm font-bold mb-2">Left Portrait File Name</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
            type="text" v-model="chat.leftPortraitName">
          </div>
          <div class="m-5 flex-grow bg-zinc-100 border rounded-md p-3 shadow-md">
            <label class="block text-gray-700 text-sm font-bold mb-2">Chat Message</label>
            <textarea class="w-full h-36" maxlength="150" v-model="chat.message"></textarea>
          </div>
          <div class="m-5 bg-zinc-100 border rounded-md p-3 shadow-md">
            <label class="text-gray-700 text-sm font-bold mb-2 mr-3">Is Right Talking</label><input class="mb-5" type="checkbox" v-model="chat.right">
            <label class="block text-gray-700 text-sm font-bold mb-2">Right Character Name</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-5" 
            type="text" v-model="chat.rightName">
            <label class="block text-gray-700 text-sm font-bold mb-2">Right Portrait File Name</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            type="text" v-model="chat.rightPortraitName">
          </div>
          
        </div>
      </div>
    </div>
  </div>
</template>

<script src="./Dialogues.js"></script>
<style src="./Dialogues.css" scoped></style>
