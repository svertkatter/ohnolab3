<!-- components/YearlyActs.vue -->
<template>
    <div class="yearly-act">
      <select v-model="selectedYear" @change="filterActs">
        <option v-for="year in years" :key="year" :value="year">
          {{ year }}
        </option>
      </select>
  
      <div v-if="filteredActs.length" class="act-list">
        <ActCard
          v-for="(act, index) in filteredActs"
          :key="index"
          :imgSrc="act.imgSrc"
          :title="act.title"
          :date="formatDate(act.date)"
        />
      </div>
      <div v-else>
        <p>選択された年度の活動がありません。</p>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  import { actData } from '~/data/actData'; // actData.js をインポート
  import ActCard from '~/components/ActCard.vue';
  
  const selectedYear = ref('2024'); // 初期値として2024年を選択
  const filteredActs = ref([]);
  
  const years = Object.keys(actData); // 年度のリストを取得
  
  const filterActs = () => {
    filteredActs.value = Object.values(actData[selectedYear.value] || []);
  };
  
  // 年度が変更されたときにデータをフィルタリング
  filterActs();
  
  // 日付をフォーマットする関数
  const formatDate = (dateStr) => {
    const date = new Date(dateStr);
    const year = date.getFullYear();
    const month = date.getMonth() + 1;
    const day = date.getDate();
    return `${year}年${month}月${day}日`;
  };
  </script>