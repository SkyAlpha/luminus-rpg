
<template>
  <div>
    <div v-for="dialogue in dialogues" :key="dialogue.id">
        {{dialogue.name}}
      <div v-for="chat in dialogue.chat" :key="chat.dialogue_id">
        <label for="">Is Left Talking</label><input type="checkbox" v-model="chat.left">
        <br/>
        <label for="">Left Character Name</label>
        <input type="text" v-model="chat.leftName">
        <br/>
        <label for="">Left Portrait File Name</label>
        <input type="text" v-model="chat.leftPortraitName">
        <br/>

        <label for="">Is Right Talking</label><input type="checkbox" v-model="chat.right">
        <br/>
        <label for="">Right Character Name</label>
        <input type="text" v-model="chat.rightName">
        <br/>
        <label for="">Right Portrait File Name</label>
        <input type="text" v-model="chat.rightPortraitName">
        <br/>
        <textarea rows="3" v-model="chat.message"></textarea>
      </div>
    </div>
  </div>
</template>

<script src="./Dialogues.js"></script>
<style src="./Dialogues.css" scoped></style>
