<template>
  <v-main>
    <v-container class="container-top-margin" fluid>
      <v-row>
        <v-col class="text-center">
          <v-img
            class="mx-auto rounded-circle"
            cover
            src="https://st3.depositphotos.com/5572200/15094/v/450/depositphotos_150942812-stock-illustration-a-man-is-riding-a.jpg"
            style="max-width: 125px"
          ></v-img>
        </v-col>
        <v-col cols="12">
          <v-card class="mx-auto px-6 py-4 custom-rounded-card">
            <v-window v-model="step">
              <v-window-item :value="1">
                <v-row>
                  <v-col class="text-center">
                    <div class="welcome-back-text">Welcome Back</div>
                  </v-col>
                </v-row>
                <v-form @submit.prevent="login">
                  
                  <v-text-field
                    v-model="emailLogin"
                    label="Email"
                    variant="outlined"  
                    placeholder="juandelacruz@email.com"
                    type="email"
                    :rules="emailRule"
                    required
                  ></v-text-field>
                  <v-text-field
                    v-model="passwordLogin"
                    label="Password"
                    variant="outlined"
                    :append-inner-icon="
                      showPasswordLogin ? 'mdi-eye-off' : 'mdi-eye'
                    "
                    @click:append-inner="togglePasswordVisibility"
                    :type="showPasswordLogin ? 'text' : 'password'"
                    :rules="passwordLoginRule"
                    required
                  ></v-text-field>
                  <v-col cols="12" class="px-0 py-0 text-right forgot-password">
                    <span @click="forgotPassword">Forgot Password?</span>
                  </v-col>
                  <v-card-actions class="mt-1 justify-center">
                    <v-btn type="submit" block color="#4E47C6" variant="tonal"
                      >Login</v-btn
                    >
                  </v-card-actions>
                </v-form>
                <v-alert v-if="loginSuccess" type="success" class="mt-3"
                  >Login Successful!</v-alert
                >
                <v-alert v-if="loginError" type="error" class="mt-3"
                  >Login Failed. Please check your credentials.</v-alert
                >
                <div class="mt-2 divider-container">
                  <v-divider></v-divider>
                  <span class="divider-text">OR</span>
                  <v-divider></v-divider>
                </div>
                <div class="text-center">
                  <v-btn
                    depressed
                    outlined
                    color="#07143F"
                    class="mr-1 ml-1 mt-4"
                  >
                    <v-icon>mdi-gmail</v-icon>
                  </v-btn>
                  <v-btn
                    depressed
                    outlined
                    color="#07143F"
                    class="mr-1 ml-1 mt-4"
                  >
                    <v-icon>mdi-facebook</v-icon>
                  </v-btn>
                  <v-card-actions class="mt-1 justify-center">
                    <div>
                      <span>Don't have an account yet? </span>
                      <span
                        class="text--primary"
                        @click="step++"
                        style="text-decoration: underline; cursor: pointer"
                        >SIGN UP</span
                      >
                    </div>
                  </v-card-actions>
                </div>
              </v-window-item>
              <v-col cols="12" class="text-center mt-2">
                <v-window-item :value="2">
                  <v-row
                    ><span
                      class="text--primary"
                      @click="step--"
                      style="text-decoration: underline; cursor: pointer"
                      >BACK</span
                    >
                    <span>Client Registration</span>
                  </v-row>
                  <v-row>
                    <v-form @submit.prevent="signUp">
                      <v-text-field
                        v-model="nameSignUp"
                        label="Name"
                        variant="outlined"
                        placeholder="Enter your Full Name"
                        required
                      ></v-text-field>
                      <v-text-field
                        v-model="emailSignUp"
                        label="Email"
                        variant="outlined"
                        placeholder="Enter your email"
                        type="email"
                        :rules="emailRule"
                        required
                      ></v-text-field>
                      <v-text-field
                        v-model="passwordSignUp"
                        label="Password"
                        variant="outlined"
                        :append-inner-icon="'mdi-eye-off'"
                        @click:append-inner="toggleNewPasswordVisibility"
                        :type="showPasswordSignUp ? 'text' : 'password'"
                        required
                        :rules="passwordSignUpRule"
                      ></v-text-field>
                      <v-text-field
                        v-model="confirmPasswordSignUp"
                        label="Confirm Password"
                        variant="outlined"
                        :append-inner-icon="'mdi-eye-off'"
                        @click:append-inner="toggleConfirmPasswordVisibility"
                        :type="showConfirmPassword ? 'text' : 'password'"
                        required
                        :rules="confirmPasswordRule"
                      ></v-text-field>
                      <v-text-field
                        v-model="contactNumberSignUp"
                        label="Contact Number"
                        variant="outlined"
                        placeholder="Enter your contact number"
                        required
                      ></v-text-field>
                      <v-autocomplete
                        v-model="selectedProvince"
                        :items="filteredProvinces"
                        label="Province"
                        outlined
                        required
                        :filter="customFilter"
                      ></v-autocomplete>
                      <v-autocomplete
                        v-model="selectedMunicipality"
                        :items="filteredMunicipalities"
                        label="Municipality"
                        outlined
                        required
                        :filter="customFilter"
                      ></v-autocomplete>
                      <v-text-field
                        v-model="postalCode"
                        label="Postal Code"
                        variant="outlined"
                        required
                      ></v-text-field>
                      <div>
                        <v-radio-group v-model="selectedUserType">
                          <v-radio label="Client" value="client"></v-radio>
                          <v-radio label="Carrier" value="carrier"></v-radio>
                        </v-radio-group>
                      </div>
                      <v-card-actions class="mt-1 justify-center">
                        <v-btn
                          type="submit"
                          block
                          color="#4E47C6"
                          variant="tonal"
                          >Sign Up</v-btn
                        >
                      </v-card-actions>
                      <v-card-actions class="mt-1 justify-center">
                        <div>
                          <span>Already have an account? </span>
                          <span
                            class="text--primary"
                            @click="step -= 2"
                            style="text-decoration: underline; cursor: pointer"
                            >LOG IN</span
                          >
                        </div>
                      </v-card-actions>
                    </v-form>
                  </v-row>
                </v-window-item>
              </v-col>
              <v-window-item :value="3"> </v-window-item>
            </v-window>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </v-main>
</template>

<script setup>
import { ref, watch } from "vue";
import { useRouter } from "vue-router";
import axios from "axios";

const router = useRouter();

const municipalities = [
  "Caloocan",
  "Las Piñas",
  "Makati",
  "Malabon",
  "Mandaluyong",
  "Manila",
  "Marikina",
];

const provinces = [
  "Abra",
  "Agusan del Norte",
  "Agusan del Sur",
  "Aklan",
  "Albay",
];

const step = ref(1);
const showPasswordLogin = ref(false);
const emailLogin = ref("");
const passwordLogin = ref("");
const loginSuccess = ref(false);
const loginError = ref(false);
const nameSignUp = ref("");
const emailSignUp = ref("");
const passwordSignUp = ref("");
const confirmPasswordSignUp = ref("");
const contactNumberSignUp = ref("");
const selectedProvince = ref(null);
const selectedMunicipality = ref(null);
const postalCode = ref("");
const showPasswordSignUp = ref(false);
const showConfirmPassword = ref(false);
const selectedUserType = ref("");

const forgotPassword = () => {
  console.log("Forgot Password clicked");
};

const togglePasswordVisibility = () => {
  showPasswordLogin.value = !showPasswordLogin.value;
};

const toggleNewPasswordVisibility = () => {
  showPasswordSignUp.value = !showPasswordSignUp.value;
};

const toggleConfirmPasswordVisibility = () => {
  showConfirmPassword.value = !showConfirmPassword.value;
};

const getCsrfToken = () => {
  return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
};

const login = async () => {
  if (!emailLogin.value || !passwordLogin.value) {
    // Check if email and password are filled
    loginSuccess.value = false;
    loginError.value = true;
    console.error("Email and password are required");
    return;
  }

  try {
    const csrfToken = getCsrfToken();
    const response = await axios.post("/login", {
      email: emailLogin.value,
      password: passwordLogin.value,
    }, {
      headers: {
        'X-CSRF-TOKEN': csrfToken
      }
    });
    loginSuccess.value = true;
    loginError.value = false;
    router.push({ name: "CarrierDashboard" });
    console.log("Registration successful", response.data);
  } catch (error) {
    loginSuccess.value = false;
    loginError.value = true;
    console.error("Registration failed", error.response.data);
  }
};

const signUp = async () => {
  try {
    const csrfToken = getCsrfToken();
    const response = await axios.post("/register", {
      name: nameSignUp.value,
      email: emailSignUp.value,
      password: passwordSignUp.value,
      password_confirmation: confirmPasswordSignUp.value,
      contact_number: contactNumberSignUp.value,
      province: selectedProvince.value,
      municipality: selectedMunicipality.value,
      postal_code: postalCode.value,
      user_type: selectedUserType.value,
    }, {
      headers: {
        'X-CSRF-TOKEN': csrfToken
      }
    });
    console.log("Registration successful", response.data);
  } catch (error) {
    console.error("Registration failed", error.response.data);
  }
};

const emailRule = [
  (v) => !!v || "Email is required",
  (v) => /.+@.+\..+/.test(v) || "Email must be valid",
];

const passwordLoginRule = [(v) => !!v || "Password is required"];

const passwordSignUpRule = [
  (v) => !!v || "Password is required",
  (v) => (v && v.length >= 8) || "Password must be at least 8 characters",
];

const confirmPasswordRule = [
  (v) => !!v || "Confirm Password is required",
  (v) => v === passwordSignUp.value || "Passwords do not match",
];

const filteredProvinces = ref([...provinces]);
const filteredMunicipalities = ref([...municipalities]);

const customFilter = (item, queryText, itemText) => {
  const searchText = queryText.toLowerCase();
  return itemText.toLowerCase().includes(searchText);
};

watch(selectedProvince, (newValue) => {
  if (newValue) {
    filteredMunicipalities.value = municipalities.filter((municipality) =>
      municipality.toLowerCase().includes(newValue.toLowerCase())
    );
  } else {
    filteredMunicipalities.value = [];
  }
});

watch(step, () => {
  emailLogin.value = "";
  passwordLogin.value = "";
  emailSignUp.value = "";
  passwordSignUp.value = "";
  confirmPasswordSignUp.value = "";
  contactNumberSignUp.value = "";
  selectedProvince.value = null;
  selectedMunicipality.value = null;
  postalCode.value = "";
  selectedUserType.value = "";
});

watch(selectedUserType, (newValue) => {
  console.log("Selected user type:", newValue);
});
</script>

<style src="/resources/css/styles.css"></style>
