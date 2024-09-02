<!-- components/YearlyActs.vue -->
<template>
    <div class="yearly-act">
        <div class="year">
            <select v-model="selectedYear" @change="filterActs" class="select-year">
        <option v-for="year in years" :key="year" :value="year">
          {{ year }}
        </option>
      </select>
        </div>
  
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
  
  const years = Object.keys(actData).sort((a, b) => b - a); // 年度のリストを取得
  
  const filterActs = () => {
    filteredActs.value = Object.values(actData[selectedYear.value] || []);
  };
  
  // 年度が変更されたときにデータをフィルタリング
  filterActs();
  
//   // 日付をフォーマットする関数
//   const formatDate = (dateStr) => {
//     const date = new Date(dateStr);
//     const year = date.getFullYear();
//     const month = date.getMonth() + 1;
//     const day = date.getDate();
//     return `${year}年${month}月${day}日`;
//   };
const formatDate = (dateStr) => {
  if (!dateStr) return ''; // 日付がない場合は空文字を返す
  
  // ハイフンで区切って日付の部分を抽出
  const dateParts = dateStr.split('-');
  
  if (dateParts.length !== 3) {
    // 日付形式が期待通りでない場合は、元の文字列を返す
    return dateStr;
  }
  
  const [year, month, day] = dateParts.map(part => parseInt(part, 10));

  // 日付の正当性を確認
  if (isNaN(year) || isNaN(month) || isNaN(day)) {
    return dateStr; // 日付が不正な場合は元の文字列を返す
  }

  const date = new Date(year, month - 1, day); // 月は0から始まるので-1
  return `${year}年${month}月${day}日`;
};


  </script>