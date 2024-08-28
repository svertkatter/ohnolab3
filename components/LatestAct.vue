<!-- components/LatestAct.vue -->
<template>
    <ActCard
      v-for="(act, index) in latestActs"
      :key="index"
      :imgSrc="act.imgSrc"
      :title="act.title"
      :date="formatDate(act.date)"
    />
  </template>
  
  <script setup>
import { actData } from '~/data/actData';

// 日付を「YYYY-MM-DD」形式から「YYYY年M月D日」にフォーマットする関数
// const formatDate = (dateStr) => {
//   const date = new Date(dateStr);
//   const year = date.getFullYear();
//   const month = date.getMonth() + 1; // 月は0から始まるので+1
//   const day = date.getDate();
//   return `${year}年${month}月${day}日`;
// };

const formatDate = (dateStr) => {
  if (!dateStr) return ''; // 日付がない場合は空文字を返す
  const date = new Date(dateStr);
  if (isNaN(date.getTime())) {
    // 日付が正しくパースされない場合は、元の文字列を返す
    return dateStr;
  }
  const year = date.getFullYear();
  const month = date.getMonth() + 1; // 月は0から始まるので+1
  const day = date.getDate();
  return `${year}年${month}月${day}日`;
};


// 全てのデータを取得し、配列に変換して日付で昇順ソート
const allActs = Object.keys(actData)
  .flatMap(year => Object.values(actData[year])) // 各年度のデータを配列に変換してフラット化
  .sort((a, b) => new Date(a.date) - new Date(b.date)); // 日付で昇順ソート

// デバッグ用にソートされた配列をコンソールに出力
//console.log('Sorted allActs:', allActs);

// 昇順の最後の2件を抽出
const latestActs = allActs.slice(-2).reverse();
  </script>