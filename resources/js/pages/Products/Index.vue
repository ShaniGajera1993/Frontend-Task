<template>
  <div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Products</h1>

    <input
      v-model="searchQuery"
      type="text"
      placeholder="Search products..."
      class="border p-2 mb-4 w-full rounded"
    />

    <div class="flex flex-wrap gap-4 mb-4">
      <select v-model="selectedCategory" class="border w-full lg:w-50 p-2 rounded">
        <option value="">All Categories</option>
        <option v-for="category in categories" :key="category" :value="category">
          {{ category }}
        </option>
      </select>

      <input
        v-model="priceRange.min"
        type="number"
        limit="0"
        min="0"
        placeholder="Min Price"
        class="border w-full lg:w-50 p-2 rounded"
      />
      <input
        v-model="priceRange.max"
        type="number"
        limit="0"
        min="0"
        placeholder="Max Price"
        class="border w-full lg:w-50 p-2 rounded"
      />

      <select v-model="sortOption" class="border w-full lg:w-50 p-2 rounded">
        <option value="">Sort By</option>
        <option value="price-asc">Price: Low to High</option>
        <option value="price-desc">Price: High to Low</option>
        <option value="name-asc">Name: A to Z</option>
        <option value="name-desc">Name: Z to A</option>
      </select>
    </div>

    <transition-group
      name="fade"
      tag="div"
      class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4"
    >
      <div
        v-for="product in visibleProducts"
        :key="product.id"
        class="border p-4 rounded shadow hover:shadow-lg transition-shadow duration-300 transform hover:scale-105"
      >
        <img
          :src="product.image_url"
          alt="Product Image"
          height="1200"
          width="1200"
          class="object-cover mb-4 rounded"
        />
        <h2 class="font-bold">{{ product.name }}</h2>
        <p class="text-gray-600">${{ product.price }}</p>
      </div>
    </transition-group>

    <button
      v-if="visibleProducts.length < filteredProducts.length"
      @click="loadMore"
      class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600"
    >
      Load More
    </button>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue';
import { defineProps } from 'vue';

const props = defineProps({
  products: Array,
});

const searchQuery = ref('');
const selectedCategory = ref('');
const priceRange = ref({ min: '', max: '' });
const sortOption = ref('');
const itemsToShow = ref(4);

const categories = computed(() => {
  return [...new Set(props.products.map((product) => product.category))];
});

const filteredProducts = computed(() => {
  let filtered = props.products;

  if (searchQuery.value) {
    filtered = filtered.filter((product) =>
      product.name.toLowerCase().includes(searchQuery.value.toLowerCase())
    );
  }

  if (selectedCategory.value) {
    filtered = filtered.filter(
      (product) => product.category === selectedCategory.value
    );
  }

  if (priceRange.value.min) {
    filtered = filtered.filter(
      (product) => product.price >= parseFloat(priceRange.value.min)
    );
  }
  if (priceRange.value.max) {
    filtered = filtered.filter(
      (product) => product.price <= parseFloat(priceRange.value.max)
    );
  }

  if (sortOption.value === 'price-asc') {
    filtered = filtered.sort((a, b) => a.price - b.price);
  } else if (sortOption.value === 'price-desc') {
    filtered = filtered.sort((a, b) => b.price - a.price);
  } else if (sortOption.value === 'name-asc') {
    filtered = filtered.sort((a, b) => a.name.localeCompare(b.name));
  } else if (sortOption.value === 'name-desc') {
    filtered = filtered.sort((a, b) => b.name.localeCompare(a.name));
  }

  return filtered;
});

const visibleProducts = computed(() => {
  return filteredProducts.value.slice(0, itemsToShow.value);
});

const loadMore = () => {
  itemsToShow.value += 4;
};
</script>